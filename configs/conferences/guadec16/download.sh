#!/bin/sh

# fahrplan
wget --no-check-certificate -q "https://static.gnome.org/guadec-2016/schedule.xml" -O /tmp/guadec-schedule.xml && mv /tmp/guadec16-schedule.xml schedule.xml

# relive
wget -q "http://live.dus.c3voc.de/relive/guadec16/index.json" -O /tmp/vod.json && mv /tmp/vod.json vod.json
rm -f /tmp/vod.json
