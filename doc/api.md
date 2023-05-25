## OpenMarketplace Api

OpenMarketplace is based on Sylius, and use Sylius's package
[SyliusApiBundle](https://github.com/Sylius/SyliusApiBundle). 
It supports REST Api in JSON.

### SyliusApi

For resources provided by Sylius, API is created by SyliusApiBundle
and the documentation is available [here](https://master.demo.sylius.com/api/v2/docs)
and at `/api/v2/docs` URL.

### Authorization
In order to authorization you need a JWT token. Use endpoint
(`/api/v2/shop/authentication-token`) with your credentials. 

![Authorization](images/api_authorization.png)

In the response, you will get a JWT token, and then you can set the authentication
token.

![Authorization](images/api_authorization_button.png)
![Authorization](images/api_authorization_bearer.png)

### Register as a vendor
Once you are an authorized user(1). Go to `/api/v2/shop/account/vendor/register`
endpoint and press button `Try it out`(2).

![Register as a vendor](images/api_vendor_register_1.png)

Fill in your data(1), and then execute(2).

![Register as a vendor](images/api_vendor_register_2.png)

Now you have to wait for the administrator to accept your request to become vendor.

![Register as a vendor](images/api_vendor_register_3.png)

### Vendor Api
Vendors have access only to their resources.

#### Endpoints for managing details of Vendor.

![Api vendor](images/api_vendor.png)
![Api vendor](images/api_vendor_images.png)


#### Endpoints for managing product listing resources, which converts to products after administration acceptance.

![Api product listing](images/api_product_listing.png)
![Api product listing](images/api_draft.png)
![Api product listing](images/api_draft_translation.png)

#### Endpoints for creating and managing attributes for Vendor's products.

![Api draft attribute](images/api_draft_attribute.png)

#### Endpoints that allow you to manage inventory of product variant.

![Api inventory](images/api_inventory.png)

#### Endpoints for getting all your orders or get more details for one order only. 

You can also cancel the order.

![Api order](images/api_order.png)

#### Endpoints for getting more details about customers who bought your products.

![Api customer](images/api_customer.png)
