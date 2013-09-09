#!/bin/bash

clowder -o main.js build.js

[ "$1" == "c" ] && uglifyjs -cm main.js
