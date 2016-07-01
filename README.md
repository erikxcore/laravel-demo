This is an example of Gulp, SCSS/SASS, Bourbon, Laravel, Vagrant/Scotchbox, Karma, Jasmine, and the US Web Design Standards in a demo project.

Prerequisites:
Bourbon is not required due to using Node-bourbon and Gulp, but can be installed if wanted/needed. If installing locally may need Ruby installed.
Node/NPM
WAMP/LAMP environment - or generally anything that can hold a PHP server
Composer (PHP Module) - Required to build Laravel, not needed directly because this step has been done though if you wanted to use artisan to generate migrations, etc. it would be required.

To get started:
After cloning or downloading the repository run the following:
npm install
gulp setup

The extra gulp command is required to pull in USWDS's assets into the source project. Technically not required, but preferred doing that over referencing the /node_modules/ folder and replacing later in Gulp. Laravel has it's own Gulp file generated from Elixir, but for pulling in assets and watching our custom SASS the base project has it's own file. The base gulp file will also create a build of the application for deployment, though it is not explicitly needed.

Synposis:
This is a simple demo of a Laravel MVC web application using US Web Design Standards as a front-end framework.
This project makes use of Unit/Integration test runners such as Karma and Jasmine.
This project was developed on ScotchBox, a lightweight LAMP setup via Vagrant.
SCSS is compiled via Bourbon - USWDS also uses Bourbon and Neat although they have not explicit dependecies. USWDS also uses a modified form of BEM CSS.
Gulp is used as a build tool as well as an automation tool for watching file changes during development.

This application directly uses JSON responses from a Node based web service located here:
https://github.com/erikxcore/node-express-mongo-api-demo
https://immense-gorge-22729.herokuapp.com/api

The Laravel application can be reached here : https://royal-eh-75204.herokuapp.com/
