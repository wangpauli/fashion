# fashion
This is a small code sample for infinite scrolling with some fake data.  Prereqs for installing:

* apache2
* php
* composer [https://getcomposer.org](https://getcomposer.org)

![Sample Screen Shot](/screenshots/sample.png?raw=true "Sample Screen Shot")

## Installation
### Server
1. clone the repository
1. `composer install` in the root directory of the repository.  You should see composer.json in the same directory.
1. Configure Apache copy conf/apache2/www to /etc/apache2/sites-available/www
  1. `a2ensite www`
1. Setup the docroot
  1. link the /var/www/web directory to the cloned repository such that /var/www/web/docroot points to the docroot directory in the repository.
1. Restart apache
  1. `sudo apachectl restart`


### Client
1. Edit your /etc/hosts file to have www.fashion.com point to your server
1. Go to http://www.fashion.com/index.html from your browser

## Tech Stack
* Backend
  * php
  * composer
  * [slim microframework](http://www.slimframework.com/)
* Frontend
  * angularjs
  * jquery
  * [ngInfiniteScroll](http://binarymuse.github.io/ngInfiniteScroll/)

## Possible Improvements
* internationalization of all strings into resource bundles
* real configuration management
* all external assets on CDN
* DataFetcher that uses a real data source (ie MySQL)
* Better CSS styling
* Unit tests
