#!/bin/bash
ZIP=/usr/bin/zip
FILENAME="recaptcha.zip"

DIR="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

MODULEDIR="$DIR/copy_this/modules/recaptcha"

cd $DIR

rm -rf $FILENAME copy_this/
mkdir -p $MODULEDIR

cd ..

cp -r application core views vendor metadata.php logo.png $MODULEDIR

cd $DIR
$ZIP -r -9 -q $FILENAME copy_this
