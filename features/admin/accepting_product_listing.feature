@managing_product_listings
Feature: Verifying product listing
  In order to create new product
  As an Administrator
  I need to be able to verify product listing

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is an vendor user "vendor" with password "vendor"
    And the store operates on a channel named "Web-US" in "USD" currency
    And I am logged in as an admin

  @ui
  Scenario: Accept product listing
    Given there is 1 product listing
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I should see product's listing status "Under verification"
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    When I click "Accept" button
    Then I should see url "#\/admin\/product-listings\/$#"
    And I should see product's listing status "Accepted"
    And I should see "Product listing accepted."

  @ui
  Scenario: Accept product listing with channel
    Given there is product listing enabled for channel
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I should see product's listing status "Under verification"
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    When I click "Accept" button
    Then there should be product with channel enabled
