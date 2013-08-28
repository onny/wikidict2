#!/usr/bin/python3
# dependencies: yaourt -S python-libtorrent-rasterbar mktorrent 

# TODO
# - check if dump is newer, only then download it, remove old

import os
import libtorrent as lt
import re
import subprocess
import time, datetime

path = "dumps/"
webpath = "http://wikidict.cc/files/"
mktorrent_bin = "/usr/bin/mktorrent"
torrenthashlist_file = "whitelist"
index_file = "../downloads"
announce = "http://tracker.project-insanity.org:6969/announce"
webseed = ""
entries = []

def debugmsg(msg):
    print(datetime.datetime.now().strftime('%Y-%m-%d %H:%M:%S')+": "+msg)

# FIXME: replace with os.listdir(path)
def walklevel(some_dir, level):
    some_dir = some_dir.rstrip(os.path.sep)
    assert os.path.isdir(some_dir)
    num_sep = some_dir.count(os.path.sep)
    for root, dirs, files in os.walk(some_dir):
        yield root, dirs, files
        num_sep_this = root.count(os.path.sep)
        if num_sep + level <= num_sep_this:
            del dirs[:]

def scandir(path, level):
    torrent = 0 
    if os.path.exists(path):
        for (path, dirs, files) in walklevel(path,level):
            for item in files:
                # if archive (dump) file
                if re.search(r'.xml.bz2$', item):
                    # add this file into our index
                    # Building a list of all files which we later use to
                    # build the index: itemname, filename, httplink,
                    #   torrentlink
                    regex = re.compile(r"([a-z]+)-\d+(-pages-meta-current).*"); 
                    entries.append([regex.sub(r"\1\2", item), item, os.stat(path+'/'+item).st_size, webpath+item, webpath+item+'.torrent'])
                    # create torrent file for package if it doesn't already exist
                    if not os.path.isfile(path+"/"+item+".torrent"):
                        with open(os.devnull, 'wb') as devnull:
                            debugmsg("Create torrent file for "+path+"/"+item)
                            subprocess.check_call(mktorrent_bin+' -a '+announce+' -o '+path+'/'+item+'.torrent '+path+'/'+item, shell=True, stdout=devnull, stderr=subprocess.STDOUT)
                        # get torrent info hash and append it to opentracker whitelist
                        info = lt.torrent_info(path+"/"+item+".torrent")
                        info_hash = info.info_hash()
                        hexadecimal = str(info_hash)
                        os.system("echo "+hexadecimal+" >> "+torrenthashlist_file)
                # if torrent file
                if re.search(r'.xml.bz2.torrent$', item):
                    # remove torrent file if the inherent package doesn't exist anymore
                    if not os.path.isfile(path+"/"+item):
                        os.system("rm "+path+"/"+item+".torrent")
    else:
        print("File or directory does not exists")
    return 0

def create_index(index_file):
    index = open(index_file, 'w')

    index.write("<div id='index'><p>Index:</p><ul><li><a href=#wiktionary_dumps>Wiktionary dumps</a></li><li><a href=#bilingual_dictionaries>Bilingual dictionaries</a></li></ul></div>\n")
    index.write("<a name='wiktionary_dumps'></a>\n")
    index.write("<h3>Wiktionary dumps</h3>\n")
    index.write("<p class=timestamp>Last update: "+datetime.datetime.now().strftime('%Y-%m-%d')+"</p>\n")
    index.write("<table class='downloads'>\n")
    for entry in entries:
        debugmsg("- Adding entry: "+entry[0])
        index.write("""<tr><td>"""+entry[0]+"""</td><td>"""+str(round(entry[2]/1024/1000,2))+""" MB</td><td><a
                    href='"""+entry[3]+"""'>HTTP</a></td><td><a
                    href='"""+entry[4]+"""'>TORRENT</a></td></tr>\n""")
    index.write("</table>\n")

    index.write("<a name='bilingual_dictionaries'></a>")
    index.write("<h3>Bilingual dictionaries</h3>\n")
    index.write("<p class=timestamp>Last update: "+datetime.datetime.now().strftime('%Y-%m-%d')+"</p>\n")
    index.write("<table class='downloads'>\n")
    # FROM, TO, SIZE, DICT_FORMAT.bz2 HTTP, DICT_FORMAT.bz2 TORRENT
    index.write("</table>\n")

    index.close


debugmsg("Start scanning directory "+path)
scandir(path,1)

debugmsg("Creating index file "+index_file)
create_index(index_file)

debugmsg("Creating index finished :)")
