@order_details
Feature: Vendor can view order details
  In order to view order details
  As a vendor I want to visit page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And the store allows shipping with "fedex"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Visiting details page
    Given There is order with property "number" with value "55" made with logged in seller
    And The order is made by customer with first name "Adam"
    And this order has new shipping address city: "Warsaw", postalCode: "12-345", street: "ul. New"
    And this order has new billing address city: "Warsaw", postalCode: "45-566", street: "ul. Old"
    And this order has new shipment
    And I am on order details page
    Then I should see order with number "55"
    And I should see customer details with name "Adam"
    And I should see customer shipping address "ul. New Warsaw"
    And I should see customer shipping address "12-345"
    And I should see customer billing address "ul. Old Warsaw"
    And I should see customer billing address "45-566"
    And I should see shipping state "Ready"

  @ui
  Scenario: Visiting details page with shipped order
    Given There is order with property "number" with value "53" made with logged in seller
    And this order has new shipment
    And this order has already been shipped
    And I am on order details page
    Then I should see order with number "53"
    And I should see shipping state "Shipped"

  @ui
  Scenario: Visiting details page
    Given There is order with property "number" with value "55" made with other seller
    And I try to open order details page
    Then the response status code should be 404
