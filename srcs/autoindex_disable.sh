#!/bin/bash
export AUTOINDEX=off
sed -i "s/autoindex on/autoindex $AUTOINDEX/g" /etc/nginx/sites-available/default
service nginx reload
