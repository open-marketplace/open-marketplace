@product_pricing
Feature: Product pricing
  As an Administrator
  I need to be able to set product price

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates on a channel named "Web-US" in "USD" currency
    And the store has a product "test"
    And I am logged in as an administrator

  @ui
  Scenario: Setting wrong value as price
    When I want to modify the "test" product
    And I change its price to $222222222222222222222222 for "United States" channel
    And I save my changes
    Then I should be notified that price has to be valid amount

  @ui
  Scenario: Setting correct value as price
    When I want to modify the "test" product
    And I change its price to $22222 for "United States" channel
    And I save my changes
    Then I should see "Success"
