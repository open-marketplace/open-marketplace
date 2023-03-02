@vendor_managing_product_listings
Feature:Creating a product listing without price.
  As a vendor, I shouldn't be able
  to create a product.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario:
    Given I am on "/"
    And I follow "My account"
    And I follow "Product listings"
    And I follow "Create Product listing"
    And I fill in "Code" with "productTest"
    And I fill in "Original price" with "20"
    And I fill in "Minimum price" with "30"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    When I click "Save draft" button
    Then I should get validation error
