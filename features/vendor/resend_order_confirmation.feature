@order_details
Feature: Resending an order confirmation email for a chosen order
  In order to be able to send a lost email again
  As an Vendor
  I want to have the order confirmation email for a chosen order sent to the customer

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And the store allows shipping with "fedex"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Resending a confirmation email for a given order
    Given There is order with property "number" with value "55" made with logged in seller
    And this order has new shipment
    When I visit order details page
    And I resend the order confirmation email as vendor
    Then I should see "Order confirmation has been successfully resent to the customer."