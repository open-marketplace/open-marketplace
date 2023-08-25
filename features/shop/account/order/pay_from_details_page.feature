@shop_account_order
Feature: Pay from order details page
  In order to pay for order
  As a customer
  I want to be able to pay for primary order if I go to pay from order details page

  Background:
    Given the store operates on a single channel in "United States"
    And the store allows paying Offline
    And the store allows shipping with "fedex"
    And there is a customer "customer test" with an email "email@example.com"
    And I am logged in as "email@example.com"
    And store has 1 products from different Vendors

  @ui
  Scenario: Pay
    Given The customer "email@example.com" has new order
    When I view the summary of my order "#000000001"
    And I follow "Pay"
    Then I should see "#000000001" in the "div.segment .header" element
    And I should be on primary order payment page

