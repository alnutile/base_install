## Base install with style guides in mind

## Quick start

~~~
composer install
bower install
touch storage/local.sqlite
php artisan migrate
php artisan db:seed
chrome http://base_app.dev:8000/auth/login
~~~~

Style Guides are [here](https://github.com/alnutile/team_style_guides)

## Setting your Laravel psr-4 namespace

See [Namespacing Your Application](http://laravel.com/docs/master/structure#namespacing-your-application)

## DB

~~~
touch storage/local.sqlite
~~~
to get going or read up on Laravel about setting db.

## Setting up Environment Variables

Copy env.local.php to .env.local.php and set the settings as needed

## Angular

You will see a great working example of ngMock which means NO backend is needed from Laravel. In this case it is just a router to hand off to
Angular BUT could just be html.

## Gulp

Auto run tests folder
Auto set Sass file to css

## Example API?

See tests/behat/base_install.feature

## Authentication

The base of this is /auth/login see routes.php for example

## IDE Helper

note _ide_helper.php file for Pstorm there is one for sublime as well.