@hiding_product
Feature: Vendor can hide his products from customers
  As a Vendor I can set products to hidden status

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Setting a product listing as disabled, checking if product disappeared and enabling back product
    Given There is a product listing accepted by administrator created by vendor
    And This product listing has status accepted
    And I am on "/en_US/product-listing-slug"
    Then I should see "product-listing-"
    And I am on "/en_US/account/vendor/product-listings"
    And I click button with id "enable"
    And I am on "/en_US/product-listing-slug"
    Then I should be notified no page exits
    And I am on "/en_US/account/vendor/product-listings"
    And I click button with id "enable"
    And I am on "/en_US/product-listing-slug"
    Then I should see "product-listing-"

