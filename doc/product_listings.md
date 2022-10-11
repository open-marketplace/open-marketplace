## Product listing creation

Registered vendor can create product listing by visiting 
Product list page (1).
And click create product button (2).

![product_listing_inex](images/product_listing_index.png)

Then vendor have to fill up product listing form.

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
where admin can view product details and decide whether to accept it or not (2).

![admin_product_view](images/admin_product_view.png)

## Product listing verification

1. ### Rejecting product
    If administrator decide to reject product, message containing
    information why product was rejected is sent to vendor, also the status
    of the product listing is set to rejected.
    
    ![conversation](images/conversation.png)
    
    Vendor can discuss this reason, or edit product and send updates for another verification.

2. ### Accepting product
    If administrator accepts product listing it becomes converted to the product
    available for the customers.

    #### Details view
    
    ![details_view](images/details.png)

## Product listing versioning

Any changes made after accepting product have to be accepted by
administrator once again.

## Adding attributes

In order to add attribute to product listing vendor have to create it 
first, by filling form (1) available from attributes management page (2).

![attributes](images/attributes.png)

Then every attribute created by vendor can be added to product listing. 

![adding_attribute](images/adding_attribute.png)

## Inventory tab
This tab displays all accepted products of the vendor, every product can
be set to tracking mode.

![inventory](images/inventory.png)

If product is set to tracked the application will not allow buying product when
quantity reaches 0,

![inventory_tracker_message](images/inventory_guard.png)
