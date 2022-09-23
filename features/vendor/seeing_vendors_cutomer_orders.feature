@order_listing
Feature: Vendor can see his customer's orders
  In order to view customer's orders
  As a Vendor
  I want to visit customer's listing page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Seeing customers orders from customers
    Given There is order with property "state" with value "new" made with logged in seller
    And I am on "/en_US/account/vendor/customers"
    And I follow "Show orders"
    Then I should see "1" orders

  @ui
  Scenario: Seeing customers orders from customer details
    Given There is order with property "state" with value "new" made with logged in seller
    And I am on "/en_US/account/vendor/customers"
    And I follow "Show"
    And I follow "Show orders"
    Then I should see "1" orders
