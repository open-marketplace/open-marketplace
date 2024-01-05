@vendor_managing_product_listings
Feature: Vendor can remove images for product listing.
  As a vendor, after I have removed product listing image
  vendor didn't see removed image

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency
    And there is an admin user "admin" with password "password"
    And there is 1 product listing created by vendor with status "verified"

  @ui
  Scenario: Trying to edit removed product listing
    Given the product listing has an image attached
    When I am on "/"
    And I follow "My account"
    And I follow "Product listings"
    And I follow "Edit"
    Then I should see image
    And I follow "Delete"
    And I click "Save draft" button

  @ui
  Scenario: Visiting product listing after deleted image:
    Given I am on "/"
    When I follow "My account"
    And I follow "Product listings"
    And I follow "Edit"
    Then I should not see image

