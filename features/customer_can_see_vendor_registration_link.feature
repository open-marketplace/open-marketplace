@customer_dashboard
Feature: Link to vendor register form is visible on customer dashboard
  In order to create new vendor account
  As an customer
  I want to see vendor registration link

  Background:
    Given the store operates on a single channel in "United States"
    And I am a logged in customer 

  Scenario: Seeing vendor form link
    When I am on "/en_US/account/dashboard"
    Then I should see "Vendor dashboard" inside sidebar
