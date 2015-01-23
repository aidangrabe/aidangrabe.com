#!/bin/bash

# file to output to. Will be overwritten if exists/created if not
OUTPUT=main.js

# files to include, order is kept
INCLUDES=(
    jquery.js
    jmedia.js
    MagicLine.js
    Main.js
)

# build script

echo "building..."

echo "// build: " $(date) > $OUTPUT

for include in ${INCLUDES[@]}; do
    echo "Adding file: ${include}.."
    cat $include >> $OUTPUT
done

echo "[OK]"
