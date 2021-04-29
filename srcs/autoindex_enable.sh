#!/bin/bash
export AUTOINDEX=on
sed -i "s/autoindex off/autoindex $AUTOINDEX/g" /etc/nginx/sites-available/default
service nginx reload
