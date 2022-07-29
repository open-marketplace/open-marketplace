@order_listing
Feature: Vendor can see his orders
  In order to view orders
  As a Vendor
  I want to visit orders listing page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Rendering all orders
    Given There is order with property "state" with value "new" made with logged in seller
    And There is order with property "state" with value "completed" made with logged in seller
    And I am on "/en_US/orders"
    Then I should see "2" orders

  @ui
  Scenario: Filtering by state
    Given There is order with property "state" with value "new" made with logged in seller
    And There is order with property "state" with value "completed" made with logged in seller
    And I am on "/en_US/orders"
    And I select "New" from "criteria[state]"
    And I click "Filter"
    Then I should see "1" orders

  @ui
  Scenario: Filtering by payment state
    Given There is order with property "paymentState" with value "awaiting_payment" made with logged in seller
    And There is order with property "paymentState" with value "paid" made with logged in seller
    And There is order with property "paymentState" with value "cancelled" made with logged in seller
    And I am on "/en_US/orders"
    And I select "Cancelled" from "criteria[paymentState]"
    And I click "Filter"
    Then I should see "1" orders
    And I select "All" from "criteria[paymentState]"
    And I click "Filter"
    Then I should see "3" orders

  @ui
  Scenario: Filtering by shipping state
    Given There is order with property "shippingState" with value "ready" made with logged in seller
    And There is order with property "shippingState" with value "shipped" made with logged in seller
    And There is order with property "shippingState" with value "cancelled" made with logged in seller
    And I am on "/en_US/orders"
    And I select "Ready" from "criteria[shippingState]"
    And I click "Filter"
    Then I should see "1" orders
    And I select "All" from "criteria[shippingState]"
    And I click "Filter"
    Then I should see "3" orders

  @ui
  Scenario: Filtering by update date
    Given There is order with property "checkoutCompletedAt" with value "2022-01-01" made with logged in seller
    And There is order with property "checkoutCompletedAt" with value "2022-01-02" made with logged in seller
    And There is order with property "checkoutCompletedAt" with value "2022-01-03" made with logged in seller
    And I am on "/en_US/orders"
    And I fill in "criteria[date][from][date]" with "2022-01-01"
    And I fill in "criteria[date][to][date]" with "2022-01-02"
    And I click "Filter"
    Then I should see "2" orders

    @ui
    Scenario: Orders list pagination
      Given There is "15" orders made with logged in seller
      And I am on "/en_US/orders"
      Then I should see "10" orders on page "1"
      And I should see 5 orders on page "2"

  @ui
  Scenario: Orders list pagination
    Given There is "23" orders made with logged in seller
    And I am on "/en_US/orders"
    Then I should see "10" orders on page "1"
    And I should see "10" orders on page "2"
    And I should see "3" orders on page "3"
