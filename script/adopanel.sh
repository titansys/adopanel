#!/bin/sh

apt -y update
apt -y install php-cli php-curl zip
mkdir adopanel
mv run.php adopanel/
rm adopanel.sh
echo "AdoPanel has been installed!"