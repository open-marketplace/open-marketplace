## Installation

### Requirements

We work on stable, supported and up-to-date versions of packages. We recommend you to do the same.

| Package       | Version |
|---------------|---------|
| PHP           | 8.0     |
| sylius/sylius | 1.11.0  |
| MySQL         | \>= 5.7 |

----

The Open Marketplace application can serve as a foundation for your custom e-commerce marketplace application.

Before creating your application, make sure you use PHP 8.0 and have Composer installed

### 1. Create project

```diff
$ composer create-project bitbag/open-marketplace project
$ cd project
$ composer install 
```

Open Marketplace as an application based on Sylius is using environment variables which configure connection
with database, mailer services, vendor products limits, vendor logo directory
and directory of files uploaded through messages. Default values are stored in `.env` file
and you can customise them by creating `.env.local` file with variables that you want to change.

 > For mailer to work properly you need to customise `MAILER_URL` in your `env.local`

 > For database to work properly you need to customise `DATABASE_URL` in your `env.local` with your database credentials

Creating database for your project

```diff
$ bin/console doctrine:database:create
$ bin/console doctrine:schema:create
```
### 2. Install & build assets

```diff
$ yarn install
$ yarn encore dev
$ bin/console assets:install 
```
You can also use  `yarn watch`  to observe and build resources after saving files.

### 3. Run the app

```diff
$ symfony server:start // or symfony serve -d --no-tls
```

### 4. Load fixtures

```diff
$ bin/console sylius:fixtures:load open_marketplace
```
### 5. Run tests
**a)** PHPUnit

```diff
vendor/bin/phpunit --colors=always tests/
```
**b)** PHPSpec

```diff
vendor/bin/phpspec run
```

**c)** PHPStan

```diff
vendor/bin/phpstan analyse -c phpstan.neon -l 8 src/
```

**d)** Behat

```diff
vendor/bin/behat 
```

**d)** Coding Standard

```diff
vendor/bin/ecs check src
```
