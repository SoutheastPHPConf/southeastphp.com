# SOUTHEASTPHP.CO

This is a community conferencing application developed with [Laravel 5.4](laravel-54-docs) and [Vue.js](vuejs).

## Installation

To make development easy, we rely on [Homestead virtual environment](laravel-homestead).

This project can be used as per-project installation, or in shared Homestead environment.
Depending which style of development you chose, you should follow suitable installation guide below. Before you go ahead, please read the next few lines.

Please follow [Homestead installation process](laravel-homestead-install) and install required dependencies.

If using shared Homestead, please remember to configure own database for the project, or use `DB_PREFIX` environment variable in the `.env` file.

Database configuration has been changed to use `DB_PREFIX`.
We have already set up a default prefix `sephpco__` for you in the `.env.example` file.
If you do not want database table prefixing, just set `DB_PREFIX` empty, or remove it from your `.env` file.

### First steps

Clone the repository to your preferred directory. Some people use `Code`, some use `dev`, it does not really matter, but you should know where the folder is located because we need the full directory path later.

You should start by cloning the repository to that directory:
``` bash 
git clone https://github.com/SoutheastPHPConf/southeastphp.co.git
```

#### Using _shared_ Homestead installation

_This guide assumes you have already successfully installed shared Homestead on your machine and can SSH into it._

1. Configure the Homestead.yml file
    - Map the domain `southeastphp.co.app` to your cloned repository public path
2. Add the domain to `/etc/hosts` with sudo access
    - `192.168.10.10  southeastphp.co.app` as in Homestead.yml `ip` and the domain
    - Or use [cogitatio/vagrant-hostsupdater](laravel-hostsupdater) or similar to automate this
3. In another terminal window change to project directory and run `vagrant up` (or `homestead up` if you set up the shortcut alias) to start the Vagrant Homestead instance
    - If the box is already running, run provisioning to apply your changes:
      `vagrant reload --provision`

#### Using _per-project_ Homestead installation

_This guide assumes you have already installed Homestead and skipped the "Configuring Homestead" steps in the installation guide._

1. CD into the folder you just cloned
    ``` bash
    cd southeastphp.co
    ```
2. Run composer install to install all php dependencies
    ``` bash
    composer install
    ``` 
3. Generate the Vagrantfile and the Homestead.yml file
    ``` bash
    php vendor/bin/homestead make
    ``` 
    You should get `Homestead Installed!` as a response
4. Open the generated `Homestead.yml` in your favourite editor and...
    - Check to see that `folders` section paths are correct
        - We are mapping `map` on your local machine to `to` on your Homestead
    - Check that the `sites` section `map` is a domain is something suitable for development (and note it for the 5th step)
    - See that the `sites` section `to:` path points to the correct `public` folder
        - It should be along the lines of `/home/vagrant/dev/southeastphp.co/public`  if your `folders` mappings are `map: [parent dir of your git clone]` and `to: /home/vagrant/dev` 
5. Add the domain to `/etc/hosts` with sudo access
    - `192.168.10.10  southeastphp.co.app` as in Homestead.yml `ip` and the domain
    - Or use [cogitatio/vagrant-hostsupdater](laravel-hostsupdater) or similar to automate this
6. In another terminal window change to project directory and run `vagrant up`  to start the Vagrant Homestead instance
    - If the box is already running, run provisioning to apply your changes:
      `vagrant reload --provision`

## Setting up the application

1. SSH into your newly created Homestead box with `vagrant ssh`
2. CD into your project directory
    - this would be the one you set in `Homestead.yml` sites section `to:` path
3. Check 
3. Run the following installation and configuration commands to set up keys and migrations
    ``` bash
    npm install
    cp .env.example .env
    php artisan key:generate
    php artisan migrate
    php artisan passport:install
    npm run dev
    ```
4. Visit the domain in Homestead.yml in your browser and you should see the site!

Now your environment is ready for development work.

## Development advice

- **Run `npm run` commands inside the virtual box**
    - This way all of use using Homestead are running (usually) the same NPM and Node versions
    - Using `npm run watch` might not always pick up changes, using `npm run watch-poll` works better in those cases
- **If you are considering doing pull requests and help this project:**
    - You should [fork the repository](gh-fork) and do your development in your forks branch that's named after the feature you are working on.
      This makes [submitting pull requests](gh-pr) super simple.
    - Please write tests, or at least run them before submitting your pull request
        - To run tests run `vendor/bin/phpunit` in the project root
        - Laravel has awesome [testing documentation](laravel-54-testing) with nice examples


[laravel-54-docs]: https://laravel.com/docs/5.4
[vuejs]: https://vuejs.org
[laravel-homestead]: https://laravel.com/docs/5.4/homestead
[laravel-homestead-install]: https://laravel.com/docs/5.4/homestead#installation-and-setup
[vagrant-hostsupdater]: https://github.com/cogitatio/vagrant-hostsupdater
[laravel-54-testing]: https://laravel.com/docs/5.4/testing
[gh-fork]: https://help.github.com/articles/fork-a-repo/
[gh-pr]: https://help.github.com/articles/proposing-changes-to-your-work-with-pull-requests/
