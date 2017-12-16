sudo apt-get install apache2 mysql-client mysql-server php7.0 libapache2-mod-php7.0 graphviz aspell php7.0-pspell php7.0-curl php7.0-gd php7.0-intl php7.0-mysql php7.0-xml php7.0-xmlrpc php7.0-ldap php7.0-zip php7.0-imap
sudo apt-get install git vlc filezilla brasero r-base rstudio libreoffice gimp godot inkscape wkhtmltopdf youtube-dl ffmpeg tesseract-ocr
sudo apt-get install npm
sudo npm install npm@latest -g
sudo npm i -g npm
sudo npm install -g n
sudo n stable
sudo chmod 777 -R /usr/lib/node_modules/
sudo npm install -g @angular/cli@latest
sudo apt-get install scratch
sudo npm install -g cordova
sudo npm install -g ionic
sudo a2enmod rewrite

#Agregar esto a /etc/apache2/sites-enabled/000default.conf
    <Directory /var/www/html>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        Order allow,deny
        allow from all
    </Directory>

sudo service apache2 restart