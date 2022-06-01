@vendor_managing_product_listings
Feature:

  Background:
    Given there is an vendor user "vendor" with password "vendor"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Accept product listing
    Given I am on "/"
    When I follow "Login"
    And I fill in "Username" with "vendor@email.com"
    And I fill in "Password" with "vendor"
    And I click "Login" button
    And I follow "My account"
    And I follow "Product List"
    When I follow "Create Product"
    And I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "Original price" with "20"
    And I fill in "Minimum price" with "30"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    And I click "Save and Add" button





