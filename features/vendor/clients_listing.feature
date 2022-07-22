@clients_listing
Feature: Vendor can view his clients
  In order to view clients
  As a Vendor
  I want to visit page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Listing customer who made order with Vendor
    Given There is order with property "state" with value "new" made with logged in seller
    And The Order is made by customer with first name "TestingClient"
    And I am on "en_US/customers"
    Then I should see "TestingClient"

  @ui
  Scenario: Not listing customers who placed an order with other suppliers
    Given There is order with property "state" with value "new" made with some seller
    And The Order is made by customer with first name "TestingClient"
    And I am on "en_US/customers"
    Then I should not see "TestingClient"
