@vendor_managing_product_listings
Feature:Creating a product listing.
  As a vendor, I need to be able
  to create a product.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Creating product listing
    Given I am on "/"
    And I follow "My account"
    And I follow "Product listings"
    And I follow "Create Product listing"
    And I fill in "Code" with "productTest"
    And I fill form with default data
    When I click "Save" button
    Then I should see product's listing status "Created"
    And I should see "Product listing created."

  @ui
  Scenario: Creating product listing with non unique code
    Given there is 1 product listing created by vendor with status "verified"
    When I am on "/"
    And I follow "My account"
    And I follow "Product listings"
    And I follow "Create Product listing"
    And I fill form with non unique code
    And I click "Save" button
    Then I should see non unique code error message
