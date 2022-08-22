@customers_details
Feature: Seeing customer's details as vendor
  In order to see customer's details in the store
  As a Vendor
  I want to be able to show specific customer's page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Seeing customers details page that placed an order with current Vendor
    Given There is order with property "state" with value "new" made with logged in seller
    And The order is made by customer with first name "TestingClient"
    And I am on customer details page
    Then I should see customer details with name "TestingClient"

  @ui
  Scenario: Not seeing customers details page that placed an order with different Vendor
    Given There is order with property "state" with value "new" made with other seller
    And The order is made by customer with first name "TestingClient"
    And I am on customer details page
    Then I should not see customer with name "TestingClient"
