@shipping_methods
Feature: Vendor can modify shipping methods
  In order to modify shipping methods
  As a Vendor
  I want to visit shipping methods page

  Background:
    Given the store operates on a channel named "United States"
    And the store also operates on another channel named "Poland"
    And the store has a zone "United States" with code "US"
    And default tax zone is "US"
    And there is a "verified" vendor user "test@company.domain" registered in country "United States"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Attempting to see methods on page
    Given I change my current channel to "United States"
    And the store has "UPS" shipping method with "$20.00" fee per unit for "United States" channel
    And the store has "FEDEX" shipping method with "$20.00" fee per unit for "Poland" channel
    And I am on "/en_US/account/vendor/shipping-methods"
    Then I should see "UPS" shipping method in "United States" channel
    And I should see "FEDEX" shipping method in "Poland" channel

  @ui
  Scenario: Attempting to enable method
    Given I change my current channel to "United States"
    And the store has "UPS" shipping method with "$20.00" fee per unit for "United States" channel and "$20.00" for "Poland" channel
    And the store has "FEDEX" shipping method with "$20.00" fee per unit for "Poland" channel
    And I am on "/en_US/account/vendor/shipping-methods"
    And I enable "UPS" shipping method in "United States" channel
    And I click "Save changes" button
    And I am on "/en_US/account/vendor/shipping-methods"
    Then I should see "UPS" enabled shipping method in "United States" channel
    Then I should see "UPS" disabled shipping method in "Poland" channel
    And I should see "FEDEX" disabled shipping method in "Poland" channel
