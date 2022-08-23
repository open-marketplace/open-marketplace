<p align="center">
    <a href="https://sylius.com" target="_blank">
        <img src="https://demo.sylius.com/assets/shop/img/logo.png" />
    </a>    
    <a href="https://bitbag.io/pl" target="_blank">
        <img src="https://bitbag.io/wp-content/themes/BitBag/dist/images/logo.svg" />
    </a>
</p>

<h1 align="center">SyliusMultiVendorMarketplacePlugin</h1>

<p align="center">Plugin to create from sylius to multi-vendor shop</p>

## Installation


1. Add plugin dependencies to your `composer.json` file:

```php
    "require": {
        "bitbag/multi-vendor-marketplace": "dev-master"
    },
    "repositories": [
        {
            "type": "composer",
            "url": "https://bitbagcommerce.repo.packagist.com/dev-mvm-customer/"
        }
    ],
```

2. Add plugin dependencies to your `config/bundles.php` file:

```php
return [
    ...

    BitBag\SyliusMultiVendorMarketplacePlugin\BitBagSyliusMultiVendorMarketplacePlugin::class => ['all' => true],
];
```

3. Import required config in your `config/packages/_sylius.yaml` file:
```yaml
# config/packages/_sylius.yaml

imports:
    ...

  - { resource: "@BitBagSyliusMultiVendorMarketplacePlugin/Resources/config/config.yml" }
```

4. Import routing in your `config/routes.yaml` file:

```yaml

# config/routes.yaml
...

bitbag_mvm_plugin:
  resource: "@BitBagSyliusMultiVendorMarketplacePlugin/Resources/config/routing.yml"
```

5. Add MVM config in your `.env` file:

```
###> MVM Config ###
LOGO_DIRECTORY=media/image/logo/
VENDOR_PRODUCTS_LIMITS=9,18,27
DEFAULT_VENDOR_PRODUCTS_LIMIT=9
MESSAGES_FILE_UPLOAD_DIRECTORY=uploads/message_files
###> MVM Config ###
```

6. Finish the installation by updating the database schema and installing assets:

```
$ composer install
$ yarn install
$ yarn encore dev
$ bin/console assets:install 
$ bin/console doctrine:database:create
$ bin/console doctrine:schema:create
$ bin/console sylius:fixtures:load mvm
$ symfony server:start // or symfony serve -d --no-tls
```
