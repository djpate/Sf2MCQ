Sf2MCQ
======

Installation
--------------

	sudo apt-get install php5-sqlite php5-intl
	sudo /etc/init.d/apache2 restart
	php bin/vendors.php --reinstall
	chmod 777 app/cache -R
	chmod 777 app/logs -R
	chmod 777 web/subject_logo -R
	nano app/config/parameters.ini # to setup db connection
	php app/console doctrine:schema:create
	php app/console doctrine:fixtures:load

Enjoy!
