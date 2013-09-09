#!/bin/bash

dir_watch=res/css/less
out_file=res/css/main.css


old_date=$(date)

while true; do
    new_date=$(date -r $dir_watch)
    [ "$old_date" != "$new_date" ] && {
        echo "compiling.."
        lessc "${dir_watch}/main.less" > "$out_file"
    }
    old_date=$new_date
    sleep 2
done
