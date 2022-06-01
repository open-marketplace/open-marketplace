@customer_dashboard
Feature: Customer can see vendor registration link
  In order to create a new vendor account
  As a customer
  I want to see vendor registration link

  Background:
    Given the store operates on a single channel in "United States"
    And I am a logged in customer 

  Scenario: Seeing vendor form link
    When I am on "/en_US/account/dashboard"
    Then I should see "Vendor dashboard" inside sidebar
