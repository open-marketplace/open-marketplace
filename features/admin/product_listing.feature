@managing_product_listings
Feature: Listing product listings
  In order to verify product listing
  As an Administrator
  I need to be able to see product listings list

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin

  @ui
  Scenario: Listing product listings
    Given there are 3 product listings
    And I am on "/admin"
    When I follow "Product listings"
    Then I should see 3 product listings

  @ui
  Scenario: Listing product details
    Given there is 1 product listing
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    When I follow "Details"
    Then I should see url "#\/admin\/product-listings\/(\d+)#"

  @ui
  Scenario: Accept listing product
    Given there is 1 product listing
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I should see product's listing status "under_verification"
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    And I click "Accept" button
    Then I should see url "#\/admin\/product-listings\/$#"
    And I should see product's listing status "verified"

  @ui
  Scenario: Reject listing product
    Given there is 1 product listing
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I should see product's listing status "under_verification"
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    And I click "Reject" button
    Then I should see url "#\/admin\/product-listings\/$#"
    And I should see product's listing status "rejected"
