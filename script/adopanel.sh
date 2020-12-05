#!/bin/bash
sudo apt -y update
sudo apt -y install php-cli php-curl zip
mkdir adopanel
mv run.php adopanel/
rm adopanel.sh
rm adopanel.zip
echo "AdoPanel has been installed!"