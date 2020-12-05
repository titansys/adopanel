# AdoPanel

📡 AdoPanel is a free service for redirecting to your Ngrok URL generated on every boot by AdoPiSoft, this effectively removes the excess effort of logging in to your monitoring dashboard just to get the remote URLs.

# 🔧 Installation

1. `wget "https://github.com/titansys/adopanel/releases/latest/download/release.zip" -O adopanel.zip`
2. `unzip adopanel.zip`
3. `chmod +x adopanel.sh`
4. `sed -i -e 's/\r$//' adopanel.sh`
5. `./adopanel.sh "admin_username" "admin_password" "unique_id"`