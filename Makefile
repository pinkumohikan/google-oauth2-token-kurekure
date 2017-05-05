
.env:
	cp .env.example .env

composer.phar:
	php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
	php composer-setup.php
	php -r "unlink('composer-setup.php');"


.PHONY: install server

install: .env composer.phar
	./composer.phar install --no-dev --prefer-dist --optimize-autoloader --no-interaction

server:
	php -S 127.0.0.1:8000 -t public/
