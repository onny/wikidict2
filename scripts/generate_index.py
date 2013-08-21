#!/usr/bin/python3
# dependencies: yaourt -S python-libtorrent-rasterbar mktorrent 

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
                # if pacman package
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
                        torrent+=1
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
                    torrent+=1
    else:
        print("File or directory does not exists")
    return torrent

debugmsg("Start scanning directory "+path)
scandir(path,1)
debugmsg("Creating Start scanning directory "+path)
debugmsg("Creating index finished :)")
