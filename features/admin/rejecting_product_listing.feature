@managing_product_listings
Feature: Rejecting product listing
  As an Administrator
  I need to be able to reject product listing

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin

  @ui
  Scenario: Reject product listing
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
