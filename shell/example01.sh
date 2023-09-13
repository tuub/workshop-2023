#!/bin/bash

INPUT_FILES=$(find input/ -name '*.jpg')
OUTPUT_DIR=output/
DATE_FORMAT=%Y-%m-%d_%H:%M:%S

for file in $INPUT_FILES;
do
  output_file=$(exiftool -DateTimeOriginal -d "$DATE_FORMAT" -s3 "$file")
  echo "Processing $file => ${OUTPUT_DIR}${output_file}.${file#*.}"
  exiftool '-filename<CreateDate' -d $DATE_FORMAT%%-c.%%le -q -ext jpg $file -o $OUTPUT_DIR
done