## Product listing creation

Registered vendor can create product listing by visiting 
Product listings page (1).
And click create product button (2).

![product_listing_inex](images/product_listing_index.png)

Then vendor user have to fill up product listing form.

In order to add attribute to product vendor have to 
[create attribute](#adding-attributes) first.

![product_form](images/product_form.png)

After saving form, vendor can edit it or send to verification by application
administrator. After sending for verification editing product is blocked.

![dropdown](images/dropdown.png)

![status](images/status.png)

Then it is up to the admin to decide whether the product list is rejected or
the product becomes available to the customer in the market, the admin can view
list of products sent for verification in the administration panel via the product listings tab (1). Each product listing has a detail page
where admin can view product details and decide whether or not to accept (2).

![admin_product_view](images/admin_product_view.png)

## Product listing verification

1. ### Rejecting product
    If administrator decide to reject product, message containing
    information why product was rejected is sent to vendor, also status
    of product listing is set to rejected.
    
    ![conversation](images/conversation.png)
    
    Vendor can discuss this reason, or edit product and send for verification
    updated product listing.

2. ### Accepting product
    If administrator accepts product listing it become converted to product
    available for customers.

## Product listing versioning

Any changes made after accepting product have to be accepted by
administrator once again.

## Adding attributes

In order to add attribute to product listing vendor have to create it 
first, by filling form (1) available from attributes management page (2).

![attributes](images/attributes.png)

Then every attribute created by vendor can be added to product listing. 

![adding_attribute](images/adding_attribute.png)

### Inventory tab
This tab displays all accepted products of vendor, every product can
be set to tracking mode.

![inventory](img/invenory.png)

If product is set to tracked application will not allow buy product when
quantity reaches 0,

![inventory_tracker_message](img/inventory_guard.png)
