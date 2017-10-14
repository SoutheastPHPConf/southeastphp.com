## SOUTHEASTPHP.CO

This is a community conferencing application developed with [`Laravel 5.4`](https://laravel.com/docs/5.4) and [`VUEJS`](https://vuejs.org/).

### Installation
- Download and install [virtual box](https://www.virtualbox.org/wiki/Downloads)
- Add laravel/homestead box to vagrant environment by running `vagrant box add laravel/homestead`
- Clone the repository
 ``` bash 
 git clone https://github.com/SoutheastPHPConf/southeastphp.co.git
 ```
- CD into the folder
``` bash
cd southeastphp.co
```
- Run composer install to install all php dependencies
``` bash
composer install
``` 
- Use npm to install javascript dependencies
``` bash
npm install
```
- Create a environment file
``` bash
cp .env.example .env
```
- Generate the Vagrantfile and the Homestead.yml file
``` bash
php vendor/bin/homestead make
``` 
You should get `Homestead Installed!` as a response
- Open the generated `Homestead.yml` and copy the domain in the site section
- Add the domain to `/etc/hosts` with sudo access
- Generate application key using the command bellow and to update your database
``` bash
php artisan key:generate

php artisan migrate
```
- Use `npm run watch` to build javascript dependencies 
- In another terminal window run `vagrant up` to start the application 
- Visit the domain in Homestead.yml in your browser and you should see the site!
