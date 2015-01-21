#!sh
#sudo apt-get install nginx php5-fpm php5-cli php5-curl php5-gd php5-mcrypt php5-mysql php5-cgi mysql-server
#sudo apt-get install motion
sudo mv /etc/php5/fpm/php.ini /etc/php5/fpm/php.ini.bak
sudo mv /etc/php5/fpm/php-fpm.conf /etc/php5/fpm/php-fpm.conf.bak
sudo mv /etc/nginx/nginx.conf /etc/nginx/nginx.conf.bak
sudo mv -r /etc/nginx/sites-available /etc/nginx/sites-available-bak
sudo mv -r /etc/nginx/sites-enabled /etc/nginx/sites-enabled-bak
sudo cp ./php* /etc/php5/fpm/
sudo cp ./nginx.conf /etc/nginx/
sudo cp -r ./sites-available /etc/nginx/
sudo cp -r ./sites-enabled /etc/nginx/
###if there is  installed motion,copy motion.conf to /etc/motion/###
sudo mv /etc/motion/motion.conf /etc/motion/motion.conf.bak
sudo cp ./motion.conf /etc/motion/
