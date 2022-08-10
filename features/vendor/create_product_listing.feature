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
    And I follow "Product list"
    And I follow "Create Product"
    And I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "Original price" with "20"
    And I fill in "Minimum price" with "30"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    When I click "Save" button
    Then I should see product's listing status "create"
    And I should see "Product listing created."
