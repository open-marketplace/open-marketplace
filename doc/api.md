## OpenMarketplace Api

OpenMarketplace is based on Sylius, and use Sylius's package
[SyliusApiBundle](https://github.com/Sylius/SyliusApiBundle). 
It supports REST Api in JSON and you can find the documentation 
available on `/api/v2/docs/` URL.

### SyliusApi

For resources provided by Sylius, API is created by ShopApiPlatform
and the documentation is available [here](https://master.demo.sylius.com/api/v2/docs).

#### Authorization
In order to authorization you need a JWT token. Use endpoint
(`/api/v2/shop/authentication-token`) with your credentials. 

![Authorization](images/api_authorization.png)


In the response, you will get a JWT token, and then you can set the authentication
token.

![Authorization](images/api_authorization_button.png)
![Authorization](images/api_authorization_bearer.png)

#### ShopApi (for shopUser only)

- `/api/v2/shop/vendor/register` - register the user as a Vendor 
and send to verification

### Vendor Api (for Vendors only)
Vendor has only access to itself resources.

- Vendor(`/api/v2/shop/account/vendor/...` or `/api/v2/shop/account/vendor-images/...`) - managing 
details of Vendor.
- DraftAttribute(`/api/v2/shop/account/vendor/draft-attributes/...` or 
`/api/v2/shop/account/vendor/draft-attribute-translations/...`) - creating and managing attributes for
Vendor's products.
- Inventory(`/api/v2/shop/account/vendor/product-variants/{code}/inventory`) - each product variants can
be `tracked`, meaning you can not sell mor then the available amount. These endpoints allow you to manage
inventory of product variant. 
- Order(`/api/v2/shop/account/vendor/orders/...`) - you can get all your orders or get more details for one
order only. You can also cancel the order.
