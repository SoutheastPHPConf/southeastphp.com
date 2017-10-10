## SOUTHEASTPHP.CO


This is a community conferencing application develop with `Laravel 5.4` and `VUEJS`.

### Installation
- Download and install virtual box from ```https://www.virtualbox.org/wiki/Downloads```
- Add laravel/homestead box to vagrant environment by running ```vagrant box add laravel/homestead` on you terminal```
- Clone the repository
 ``` bash 
 git clone https://github.com/SoutheastPHPConf/southeastphp.co.git
 ```
- Then cd into the folder with this command-
``` bash
cd southeastphp.co
```
- Then run composer install to install all php dependencies and javascript dependenciesthen npm install
``` bash
composer install
``` 
and 
``` bash
npm install
```
- Then create a environment file using this command
``` bash
cp .env.example .env
```
- Next is to generate the Vagrantfile and the Homestead.yml file
``` bash
php vendor/bin/homestead make
``` 
you should get `Homestead Installed!` as a response
- Open the generated `Homestead.yml` and copy the domain in the site section
- Add the domain to /etc/hosts with sudo access
- Generate application key using the command bellow and to update your database
``` bash
php artisan key:generate

php artisan migrate
```
- Run `npm run watch` to build javascript dependencies 
- Run `vagrant up` to start the application on another terminal window
- Visit the domain on Homestead.yml in your browser and you should see
