@managing_product_listings
Feature: Product listing details
  In order to verify product listing
  As an Administrator
  I need to be able to see the details of the product listing

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is an vendor user "vendor" with password "vendor"
    And I am logged in as an admin

  @ui
  Scenario: Going to product listing details page
    Given there is a product listing with code "product-listing-code" and name "product-listing-name" and status "under_verification"
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    When I follow "Details"
    Then I should see url "#\/admin\/product-listings\/(\d+)#"
    And I should see "product-listing-code"
    And I should see "under_verification"
