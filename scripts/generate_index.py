#!/usr/bin/python3
# dependencies: yaourt -S python-libtorrent-rasterbar mktorrent 

# TODO
# - check if dump is newer, only then download it, remove old

import os
import libtorrent as lt
import re
import subprocess
from datetime import datetime

path = "dumps/"
webpath = "http://onny.project-insanity.org/wikidict-neu/files/"
mktorrent_bin = "/usr/bin/mktorrent"
torrenthashlist_file = "whitelist"
index_file = "downloads.html"
announce = "http://tracker.project-insanity.org:6969/announce"
webseed = ""
entries = []

def debugmsg(msg):
    print(datetime.now().strftime('%Y-%m-%d %H:%M:%S')+": "+msg)

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

                        # Building a list of all files which we later use to
                        # build the index: itemname, filename, httplink,
                        #   torrentlink
                        regex = re.compile(r"([a-z]+)-\d+(-pages-meta-current).*"); 
                        entries.append([regex.sub(r"\1\2", item), item, webpath+item, webpath+item+'.torrent'])

                # if torrent file
                if re.search(r'.xml.bz2.torrent$', item):
                    # remove torrent file if the inherent package doesn't exist anymore
                    if not os.path.isfile(path+"/"+item):
                        os.system("rm "+path+"/"+item+".torrent")
                    else:
                        # get torrent info hash and append it to opentracker whitelist
                        info = lt.torrent_info(path+"/"+item)
                        info_hash = info.info_hash()
                        hexadecimal = str(info_hash)
                        os.system("echo "+hexadecimal+" >> "+torrenthashlist_file)
    else:
        print("File or directory does not exists")
    return 0

def create_index(index_file):
    index = open(index_file, 'w')

    index.write("<h1>Wiktionary dumps</h1>")
    index.write("<table class='downloads'>")
    for entry in entries:
        index.write("""<tr><td>"""+entry[0]+"""</td><td><a
                    href='"""+entry[2]+"""'>HTTP</a></td><td><a
                    href='"""+entry[3]+"""'>TORRENT</a></td></tr>""")
    index.write("</table>")

    index.write("<h1>Bilingual dictionaries</h1>")
    index.write("<table class='downloads'>")
    # FROM, TO, SIZE, DICT_FORMAT.bz2 HTTP, DICT_FORMAT.bz2 TORRENT
    index.write("</table>")

    index.close


debugmsg("Start scanning directory "+path)
scandir(path,1)

debugmsg("Creating index file "+index_file)
create_index(index_file)

debugmsg("Creating index finished :)")
