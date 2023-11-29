@managing_product_listings
Feature: Listing product listings
  In order to verify product listing
  As an Administrator
  I need to be able to see product listings list

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is a vendor user "vendor" with password "vendor"
    And I am logged in as an admin
    And the store operates on a single channel

  @ui
  Scenario: Listing product listings
    Given there are 3 product listings
    And I am on "/admin"
    When I follow "Product listings"
    Then I should see 3 product listings
