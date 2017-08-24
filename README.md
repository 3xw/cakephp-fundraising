# cakephp-fundraising plugin for CakePHP
This plugin allows you cache and store data in redis engine

## Installation

You can install this plugin into your CakePHP application using [composer](http://getcomposer.org).

The recommended way to install composer packages is:

	composer require 3xw/cakephp-fundraising

Load it in your config/boostrap.php

	Plugin::load('Trois/FR', ['routes' => true, 'bootstrap' => true]);

Run the following command in the CakePHP console to create the tables using the Migrations plugin:

	bin/cake Migrations migrate -p Trois/FR

## more to come
