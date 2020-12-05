#!/bin/bash
sudo apt -y update
sudo apt -y install php-cli php-curl zip
mkdir adopanel
mv run.php adopanel/
mv adopanel.sh adopanel/
rm adopanel.zip
(crontab -l 2>/dev/null || true; echo "@reboot nohup php /home/pi/adopanel/run.php '$1' '$2' '$3' &") | crontab -
echo "AdoPanel has been installed!"