@dashboard_statistics
Feature: Viewing dashboard statistics
  As admin user in dashboard panel
  I want to see only statistics correlated with
  secondary orders

  Background:
    And I am logged in as an administrator
    And the store operates on a single channel in "United States"
    And the store has "UPS" shipping method with "$20.00" fee per unit for "United States" channel
    And the store allows paying with "Cash on Delivery"
    And the store has a product "Jeans" priced at "$150" in "United States" channel
    And there is an "000000011" order with "Jeans" product in "United States" channel

  @ui
  Scenario: Viewing sales summary
    Given I am on "/admin"
