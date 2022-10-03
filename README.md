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

    BitBag\OpenMarketplace\BitBagSyliusMultiVendorMarketplacePlugin::class => ['all' => true],
];
```

3. Import required config in your `config/packages/_sylius.yaml` file:
```yaml
# config/packages/_sylius.yaml

imports:
    ...

  - { resource: "@BitBagSyliusMultiVendorMarketplacePlugin/Resources/config/config.yml" }
```

```yaml
# config/packages/_sylius.yaml

...

sylius_order:
  resources:
    order:
      classes:
        model: App\Entity\Order
    order_item:
      classes:
        model: App\Entity\OrderItem

sylius_product:
  resources:
    product:
      classes:
        model: App\Entity\Product

sylius_user:
  resources:
    shop:
      user:
        classes:
          model: App\Entity\ShopUser
          interface: BitBag\OpenMarketplace\Entity\ShopUserInterface

```

4. Import routing in your `config/routes.yaml` file:

```yaml

# config/routes.yaml
...

bitbag_mvm_plugin:
  resource: "@BitBagSyliusMultiVendorMarketplacePlugin/Resources/config/routing.yml"
```


5. Extend `Product`,`Order`,`OrderItem` and `ShopUser` (including Doctrine mapping)::

```php
<?php

declare(strict_types=1);

namespace App\Entity;

use BitBag\OpenMarketplace\Entity\OrderInterface;
use BitBag\OpenMarketplace\Model\Order\OrderTrait;
use Sylius\Component\Core\Model\Order as BaseOrder;

class Order extends BaseOrder implements OrderInterface
{
    use OrderTrait;
}
```

```php
<?php

declare(strict_types=1);

namespace App\Entity;

use BitBag\OpenMarketplace\Entity\OrderItemInterface;
use BitBag\OpenMarketplace\Model\OrderItem\OrderItemTrait;
use Sylius\Component\Core\Model\OrderItem as BaseOrderItem;

class OrderItem extends BaseOrderItem implements OrderItemInterface
{
    use OrderItemTrait;
}
```

```php
<?php

declare(strict_types=1);

namespace App\Entity;

use BitBag\OpenMarketplace\Entity\ShopUserInterface;
use BitBag\OpenMarketplace\Model\ShopUser\ShopUserTrait;
use Sylius\Component\Core\Model\ShopUser as BaseShopUser;

class ShopUser extends BaseShopUser implements ShopUserInterface
{
    use ShopUserTrait;
}
```

```php
<?php

declare(strict_types=1);

namespace App\Entity;

use BitBag\OpenMarketplace\Entity\ProductInterface;
use BitBag\OpenMarketplace\Model\Product\ProductTrait;
use Sylius\Component\Core\Model\Product as BaseProduct;

class Product extends BaseProduct implements ProductInterface
{
    use ProductTrait;
}
```

Mapping (Annotations)
```xml
<!-- ../confog/doctrine/Order.orm.xmls -->

<?xml version="1.0" encoding="UTF-8" ?>
<doctrine-mapping xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
        http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <mapped-superclass name="App\Entity\Order" table="sylius_order">
        <many-to-one field="vendor" target-entity="BitBag\OpenMarketplace\Entity\VendorInterface" inversed-by="products" />
        <many-to-one field="primaryOrder" target-entity="App\Entity\Order" inversed-by="secondaryOrders">
            <join-column on-delete="SET NULL"/>
        </many-to-one>
        <one-to-many field="secondaryOrders" target-entity="App\Entity\Order" mapped-by="primaryOrder"/>
    </mapped-superclass>
</doctrine-mapping>
```

```xml
<!-- ../confog/doctrine/OrderItem.orm.xmls -->

<?xml version="1.0" encoding="UTF-8" ?>
<doctrine-mapping xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
        http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <mapped-superclass name="App\Entity\OrderItem" table="sylius_order_item">
        <association-overrides>
            <association-override name="order">
                <join-table name="sylius_order">
                    <join-columns>
                        <join-column name="order_id" nullable="false" on-delete="CASCADE" />
                    </join-columns>
                </join-table>
            </association-override>
        </association-overrides>
    </mapped-superclass>
</doctrine-mapping>
```

```xml
<!-- ../confog/doctrine/Product.orm.xmls -->

<?xml version="1.0" encoding="UTF-8" ?>
<doctrine-mapping xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
        http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">

    <mapped-superclass name="App\Entity\Product" table="sylius_product">
        <many-to-one field="vendor" target-entity="BitBag\OpenMarketplace\Entity\VendorInterface" inversed-by="products" />
    </mapped-superclass>
</doctrine-mapping>
```

```xml
<!-- ../confog/doctrine/ShopUser.orm.xmls -->

<?xml version="1.0" encoding="UTF-8" ?>
<doctrine-mapping xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                  xmlns="http://doctrine-project.org/schemas/orm/doctrine-mapping"
                  xsi:schemaLocation="http://doctrine-project.org/schemas/orm/doctrine-mapping
                  http://doctrine-project.org/schemas/orm/doctrine-mapping.xsd">
    <mapped-superclass name="App\Entity\ShopUser" table="sylius_shop_user">
        <one-to-one field="vendor" target-entity="BitBag\OpenMarketplace\Entity\VendorInterface" mapped-by="shopUser" />
    </mapped-superclass>
</doctrine-mapping>
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
