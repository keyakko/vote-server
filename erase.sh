#!/bin/bash
ssh keyakko@127.0.0.1 '/usr/bin/mysql -uroot -proot < /var/www/html/reset.sql 2>/dev/null'
