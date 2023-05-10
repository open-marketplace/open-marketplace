@settlement
Feature: In case of creating the order
  I want the commission to be automatically calculated

  Background:
    Given the store operates on a single channel in "United States"
    And store has 5 products from different Vendors
    And there is a customer "customer test" with an email "email@example.com"
    And I am a logged in customer with name "customer test"

  @ui
  Scenario: Picking products from different Vendors
    Given I have 3 products in cart
    And I finalize order
    Then commision should be calculated for each secondary order
