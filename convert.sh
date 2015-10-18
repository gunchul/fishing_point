#!/bin/sh

convert_in_dir() {
files=`ls orig/*.*`

for file in $files; do
    bfile=`basename $file`

    if [ ! -f conv_$bfile ]; then
      echo convert $file to conv_$bfile
      convert $file -resize 640 conv_$bfile
    fi
done
}

cd img
dirs=`ls -d -- *`

if [ $1 = "clean" ]; then 
    for dir in $dirs; do
								echo clean in $dir
								( cd $dir ; rm -f *.* ) 
				done
else
				for dir in $dirs; do
								echo convert in $dir
								( cd $dir ; convert_in_dir ) 
				done
fi