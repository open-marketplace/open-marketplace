@clients_listing
Feature: Vendor can view his clients
  In order to view clients
  As a Vendor I want to visit page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Listing a customer who made order with Vendor
    Given There is order with property "state" with value "new" made with logged in seller
    And The order is made by customer with first name "TestingClient"
    And I am on customers page
    Then I should see customer with name "TestingClient"

  @ui
  Scenario: Not listing customers who placed an order with other vendors
    Given There is order with property "state" with value "new" made with other seller
    And The order is made by customer with first name "TestingClient"
    And I am on customers page
    Then I should not see customer with name "TestingClient"
