@editing_orders
Feature: Editing orders as an administrator

  Background:
    Given the store operates on a single channel in the "United States" named "Web"
    And the store ships everywhere for free
    And the store allows paying with "Cash on Delivery"
    And the store has a product "Hawaiian shirt" priced at "$400.00"
    And there is a customer "peter@griffin.com" that placed an order "#00000001"
    And the customer bought a single "Hawaiian shirt"
    And the customer "Peter Griffin" addressed it to "31 Spooner Street", "10118" "Quahog" in the "United States"
    And the customer set the billing address as "Peter Griffin", "31 Spooner Street", "10118", "Quahog", "United States"
    And the customer chose "Free" shipping method with "Cash on Delivery" payment
    And I am logged in as an administrator

  @ui
  Scenario: Editing address for order
    When I want to modify a customer's shipping address of this order
    And I specify their shipping address as "Quahog", "29 Spooner Street", "10118", "United States" for "Glenn Quagmire"
    And I save my changes
    Then I should be notified that it has been successfully edited
