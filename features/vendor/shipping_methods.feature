@shipping_methods
Feature: Vendor can modify shipping methods
  In order to modify shipping methods
  As a Vendor
  I want to visit shipping methods page

  Background:
    Given the store operates on a single channel in "United States"
    And there is a "verified" vendor user "test@company.domain" registered in country "United States"
    And I am logged in as "test@company.domain"
    And the store has "UPS" shipping method with "$20.00" fee
    And the store has "FEDEX" shipping method with "$20.00" fee

  @ui
  Scenario: Attempting to see methods on page
    Given I am on "/en_US/vendor/shipping-methods"
    Then I should see "UPS" shipping method
    And I should see "FEDEX" shipping method

  @ui
  Scenario: Attempting to enable method
    Given I am on "/en_US/vendor/shipping-methods"
    And I enable "UPS" shipping method
    And I click "Save changes" button
    And I am on "/en_US/vendor/shipping-methods"
    Then I should see "UPS" enabled shipping method
    And I should see "FEDEX" disabled shipping method
