MFCC - ZendSkeletonApplication
=======================

Introduction
------------
This is a simple, skeleton application using the ZF2 MVC layer and module
systems.

This skeleton comes with:

* [Zend Developer Tools](https://github.com/zendframework/ZendDeveloperTools)
* [Zfc Twitter Bootstrap](https://github.com/mwillbanks/ZfcTwitterBootstrap)
* [Doctrine](http://www.doctrine-project.org/)
* [ZfcUser - Doctrine](https://github.com/ZF-Commons/ZfcUser)
* [Social Auth - Doctrine](https://github.com/SocalNick/ScnSocialAuth)
* [Faker](https://github.com/fzaninotto/Faker)
* [Carbon](https://github.com/briannesbitt/Carbon)

Project is integrated with:
* [Fabric](http://www.fabfile.org/)
* [Bower](http://bower.io/)
* [Gulp](http://gulpjs.com/)


Installation
------------

Using Composer (recommended)
----------------------------
The recommended way to get a working copy of this project is to clone the repository
and use `composer` to install dependencies using the `create-project` command:

    curl -s https://getcomposer.org/installer | php --
    php composer.phar create-project mfcc/skeleton-application path/to/install

Alternately, clone the repository and manually invoke `composer` using the shipped
`composer.phar`:

    cd my/project/dir
    git clone https://github.com/Tlapi/ZendSkeletonApplication.git
    cd ZendSkeletonApplication
    php composer.phar self-update
    php -c php.ini composer.phar install

(The `self-update` directive is to ensure you have an up-to-date `composer.phar`
available.)

Project Setup
----------------

### Setup project configs

Set your db connection. Copy `config/autoload/local.php.dist` to `config/autoload/local.php` and provide username, password etc.

Set your social login integration if needed in `config/autoload/scn-social-auth.global.php` and `config/autoload/scn-social-auth.local.php.dist`

### Create entities

Create your Entities and Repositories. Example provided is in `module/Application/src/Application/Entity/Article.php`

### Create database

Run `php vendor/bin/doctrine orm:schema-tool:update --force` to create your database.

### [optional] Set up Fabric

### [optional] Set up Bower

### [optional] Set up Gulp

### Create databse

To setup apache, setup a virtual host to point to the public/ directory of the
project and you should be ready to go! It should look something like below:

    <VirtualHost *:80>
        ServerName zf2-tutorial.localhost
        DocumentRoot /path/to/zf2-tutorial/public
        SetEnv APPLICATION_ENV "development"
        <Directory /path/to/zf2-tutorial/public>
            DirectoryIndex index.php
            AllowOverride All
            Order allow,deny
            Allow from all
        </Directory>
    </VirtualHost>
