# Crescendo Clothing - An eCommerce Clothing Site (Epicodus Group Project - PHP/CSS)

# http://crescendo-clothing.herokuapp.com/

#### Requirement: Take the PHP and CSS knowledge we have learned over the past four weeks and create anything we want! - March 11, 2016

#### By _**[Jason Awbrey](https://github.com/fight-gravity) (PHP) | [Jordan Meier](https://github.com/Jordan-Meier) (PHP) | [Blake Scott](https://github.com/blakerscott) (PHP) | [Josh Overly](https://github.com/joshoverly) (PHP) | [Sara Wagner](https://github.com/swagner23q) (CSS)**_

## Description
_The task at hand was to create a project within a four day span working in a new group with back and front end developers. We decided to use our newly acquired PHP and CSS skills to create a mock eCommerce site. We aimed to have functionality like creating user accounts, ability to log in / out, add items to a shopping cart, go through a checkout process, and have emails be sent to the user upon registration and order completion. We were able to achieve these goals within our time limit, and Sara made it look amazing!_

## Required Technology to see this app in action
* _Git_
* _PHP_
* _MySQL_
* _phpMyAdmin (suggested)_
* _Composer_
* _A sense of humor_

## Steps for Setup
* _*Heroku setup still in progress as of 3/11/16, follow the instructions below for now:_
* _Verify that PHP 5.6+ is installed on your machine_
* _Open your preferred method of accessing Git (like a terminal window)_
* _Clone the repo with the following command:_
* _git clone https://github.com/fight-gravity/crescendo.git_
* _From the root project directory install all dependancies via this command: composer install_
* _Setup the database. For creating what is absolutely required see the database section below._
* _Start a php server in the root/web directory: php -S localhost:8000 -t /path/to/crescendo/web_
* _Point a browser at localhost:8000_
* _Enjoy_

## Database Setup
_A zip version of the required database has been included in this repository. It was created following the instructions found here:_ https://www.learnhowtoprogram.com/php/database-basics-with-php/exporting-mysql-databases-in-phpmyadmin
* _Follow the instructions found at that site for importing the zipped copy of the DB with phpMyAdmin._
* _DB creation statements are also included in the repository, they are found at root/db/db-sql-create-statements.sql_

## Note About Tests
* _In order for all phpUnit tests to pass you'll need to make sure the product_types table is populated. No other data in the DB is required. Insert required data with this statement:_
* INSERT INTO `product_types` (type) VALUES ("shirt"), ("pants"), ("shoes"), ("jacket"), ("beanies");

## Known Bugs
* _If a user needs to register during the checkout process they will be able to register but then won't be able to log in without specifically going through the sign in route and then back to their cart_
* _Home page mp4 does not loop correctly_

## Backlog
* _Sanitize input, escape output_
* _Refactor queries in try/catch blocks with custom error messages_
* _Refactor queries with prepare, bind, and exec architecture_
* _Add some fancy JavaScript behavior to product images and other page transitions_
* _Add additional media query support for various device sizes_
* _Refactor design with mobile first approach_
* _Host application on Heroku_
* _Limit user email registration to unique emails_
* _Add application support for inventory_
* _Add ability to choose sizes on products_
* _Refactor Business Logic to include additional classes, and utilize more OOP design architecture_
* _Display order history on a user profile page, allow for telescoping into each order for details_
* _Display custom welcome message in navbar when user is logged in_
* _Change order total based upon shipping type_
* _Add Password Reset functionality_
* _Add Content Pages.. about us, careers, etc_
* _Add ability to sign up for a newsletter_
* _Refactor cart to show as a modal instead of a separate page_
* _Add ability to edit quantity of line item in cart_
* _Add ability to delete line item in cart_
* _Add ability to check out as a guest_
* _Add search functionality_


## Technologies Used
* _PHP_
* _Silex_
* _Twig_
* _Swift Mailer_
* _PHPUnit_
* _MySQL_
* _phpMyAdmin_
* _Apache_
* _Sass_
* _Materialize CSS_

### License

*This software is licensed under the MIT license.*

Copyright (c) 2016 **By Jason Awbrey | Jordan Meier | Blake Scott  | Josh Overly | Sara Wagner**
