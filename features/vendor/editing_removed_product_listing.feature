@vendor_managing_product_listings
Feature: Trying to editing removed a product listing.
  As a vendor, after I have removed product listing
  vendor can't access edit page of this product listing

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency
    And there is an admin user "admin" with password "password"

  @ui
  Scenario: Trying to edit removed product listing
    Given there is 1 product listing created by vendor
    And the product listing is removed
    When I am on edit page product listing "/en_US/account/vendor/product-listings/edit"
    Then I should see "The product listing you are trying to reach has been deleted."

