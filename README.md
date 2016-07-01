This is an example of Gulp, SCSS/SASS, Bourbon, Laravel, Vagrant/Scotchbox, and the US Web Design Standards in a demo project.

Prerequisites:

Bourbon is not required due to using Node-bourbon and Gulp, but can be installed if wanted/needed. If installing locally may need Ruby installed.

Node/NPM

WAMP/LAMP environment - or generally anything that can hold a PHP server

Composer (PHP Module) - Required to build Laravel, not needed directly because this step has been done though if you wanted to use artisan to generate migrations, etc. it would be required.

To get started:
If you have a Vagrant box setup, move to your /var/www/public/ directory (otherwise navigate to your htdocs folder for Apache, etc. Laravel has it's own requirements that will need to be met, as well), then:

git clone git@github.com:erikxcore/laravel-demo.git

mkdir laravel; cd laravel

git clone -b laravel git@github.com:erikxcore/laravel-demo.git ./

cd ..

npm install (not neccesarily required to run)

cd laravel

composer install (generates vendor folder)

cp .env.example .env

You will need to modify your Apache's server's default configuration to point a Virtual Host to /var/www/public/laravel-demo/laravel/public/ (path may differ), otherwise you will typically only see directory structures of folders.


Originally this project only existed in the master branch, but due to deployment to Heroku a seperate branch was required to properlly run composer install. Currently the master branch is used only to generate SASS quickly and deploy into the Laravel folder and to create a production-ready folder for deployment. Gulp was used on the master branch to pull in some extra dependecies, such as the USWDS CSS framework into Laravel.

Synposis:
This is a simple demo of a Laravel MVC web application using US Web Design Standards as a front-end framework.

This project was developed on ScotchBox, a lightweight LAMP setup via Vagrant.

SCSS is compiled via Bourbon - USWDS also uses Bourbon and Neat although they have not explicit dependecies. USWDS also uses a modified form of BEM CSS.

Gulp is used as a build tool as well as an automation tool for watching file changes during development.

This application directly uses JSON responses from a Node based web service located here:
https://github.com/erikxcore/node-express-mongo-api-demo
https://immense-gorge-22729.herokuapp.com/api

The Laravel application can be reached here : https://royal-eh-75204.herokuapp.com/ which is under this repository in the 'laravel' branch.
