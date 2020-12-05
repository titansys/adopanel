# AdoPanel

📡 AdoPanel is a free service for redirecting to your Ngrok URL generated on every boot by AdoPiSoft, this effectively removes the excess effort of logging in to your monitoring dashboard just to get the remote URLs.

# Installation

Enable ssh on your AdoPiSoft admin panel then login to ssh using a terminal like putty or a native linux terminal

1. `ssh pi@your_rpi_ipaddress` - Default password is "raspberry"

After that, run the following commands one by one.

1. `wget "https://github.com/titansys/adopanel/releases/latest/download/release.zip" -O adopanel.zip`
2. `unzip adopanel.zip`
3. `chmod +x adopanel.sh`
4. `sed -i -e 's/\r$//' adopanel.sh`
5. `./adopanel.sh "admin_username" "admin_password" "unique_id"` - Change the admin_username to your AdoPiSoft admin username and the admin_password with your AdoPiSoft admin password. After that, change the unique_id with the id you want to use to access your ngrok url. For example, you used "testingpanel" then you will access your ngrok url with https://adopanel.ml/testingpanel
6. `sudo reboot` - Reboot your machine for everything to take effect. 
7. After finishing reboot, you should be able to access your ngrok remote address by going to https://adopanel.ml/unique_id

# Notes

- This guide assumes that you already added your ngrok auth token in the admin panel of your AdoPiSoft.
- When your AdoPiSoft machine reboots, adopanel will wait for 2 minutes to make sure that AdoPiSoft system has already started so the ngrok remote url will already be available upon sending to adopanel server.
- Only your ngrok's remote url is uploaded to the server, so rest assured that adopanel is safe to be used.