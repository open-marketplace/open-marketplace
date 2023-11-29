@managing_product_listings
Feature: Product listing details
  In order to verify product listing
  As an Administrator
  I need to be able to see the details of the product listing

  Background:
    Given there is an admin user "admin" with password "admin"
    And the store operates on a single channel in "United States"
    And there is a vendor user "vendor" with password "vendor"
    And the store operates on a channel named "Web-US" in "USD" currency
    And I am logged in as an admin

  @ui
  Scenario: Going to product listing details page
    Given There is attribute with code "test_attribute"
    And There is a product listing with code "product-listing-code" and name "product-listing-name" and status "under_verification" with attribute and image
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    When I follow "Details"
    Then I should see url "#\/admin\/product-listings\/(\d+)#"
    And I should see "product-listing-description"
    And I should see "attribute_testing_value"
    And I should see image
