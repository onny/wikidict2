#!/usr/bin/python3
import requests
import os,sys
from bs4 import BeautifulSoup
from datetime import datetime
import re

source = 'http://wikipedia.c3sl.ufpr.br/'
destdir = 'dumps'

def debugmsg(msg):
    print(datetime.now().strftime('%Y-%m-%d %H:%M:%S')+": "+msg)

def parse(source, state):
    try:
        response = requests.get(source)
    except:
        return 1
    soup = BeautifulSoup(response.text)
    if (state == 1):
        length = len(soup.find('table').findAll('tr'))
        newestfolder = str(soup.find('table').findAll('tr')[length-2].findAll('td')[1].find('a').get('href'))
        debugmsg("found newest entry in wiktionary folder: "+newestfolder)
        get_downloadlink(source+newestfolder)
    else:
        for tr in soup.find('table').findAll('tr'):
            if tr.find('td'):
                link = tr.findAll('td')[1].find('a').get('href')
                if("wiktionary" in link):
                        debugmsg("found wiktionary project dir: "+link)
                        parse(source+link,1)

def get_downloadlink(source):
    try:
        response = requests.get(source)
    except:
        return 1
    soup = BeautifulSoup(response.text)
    for a in soup.findAll('a'):

        # start download only if the file doesn't exist yet
        matchObject = re.search(r'([a-z]+)-(\d+)-pages-meta-current.*', a.string)
        if matchObject:
            date_link = matchObject.group(2)
            dump_name = matchObject.group(1)
            date_dump = []
            for dumpfile in os.listdir(destdir):
                matchObject = re.search(r''+dump_name+'-(\d+)-pages-meta-current.xml.bz2$', dumpfile)
                if matchObject:
                    date_dump.append(matchObject.group(1))
            # also remove all older files
            for dumpfile in date_dump:
                if(date_link>dumpfile):
                    os.system('rm '+destdir+'/'+dump_name+'-'+dumpfile+'-pages-meta-current.xml.bz2')
                    date_dump.remove(dumpfile)
            if (len(date_dump)==0):
                debugmsg("found download link for latest, relevant dump: "+a.string)
                download_dump(source+a.string,a.string)
            else:
                debugmsg("skipping download of already existing or old dump: "+a.string)

def download_dump(link,filename):
    debugmsg("starting download ...")
    try:
        response = requests.get(link)
    except:
        return 1
    with open(destdir+"/"+filename, "wb") as out_file:
            out_file.write(response.content)

debugmsg("starting parser, parsing: "+source)
parse(source,0)
debugmsg("crawling finished :)")
