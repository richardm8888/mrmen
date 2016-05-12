# Mr Men Book Website

A working version of this website prototype can be found at [http://moss-development.co.uk/mrmen](http://moss-development.co.uk/mrmen.)

###### Install Node JS
`sudo apt-get install -y nodejs npm`

###### Install composer
`curl -sS https://getcomposer.org/installer | sudo php -- --install-dir=/usr/local/bin --filename=composer`

###### Clone GIT repository
```
git clone https://github.com/richardm8888/mrmen.git mrmen
cd mrmen
```
###### Install package dependencies using NPM
`npm install`

###### Install package dependencies using composer
`composer install`

###### Create .env file and edit it with correct settings for production environment (APP_ENV = production and APP_DEBUG = false)
`cp .env.example .env`

###### Create application key
`php artisan key:generate`

###### Change permissions on storage directory
`chmod -R 755 storage`

