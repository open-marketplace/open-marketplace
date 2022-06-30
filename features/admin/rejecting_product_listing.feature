@managing_product_listings
Feature: Rejecting product listing
  As an Administrator
  I need to be able to reject product listing

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin
    And there is a vendor user "test@company.domain" registered in country "PL"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Reject product listing creates conversation
    Given there is 1 product listing created by vendor
    And I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I should see product's listing status "under_verification"
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    And I fill in "mvm_conversation[messages][__name__][content]" with "reason to reject"
    And I click "Reject" button
    Then I should see url "#\/admin\/product-listings\/$#"
    And I should see product's listing status "rejected"
    And I am logged in as "test@company.domain"
    And I am on "/en_US/vendor/conversations"
    And I should see "reason to reject"
