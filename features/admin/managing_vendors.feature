@managing_vendors
Feature: Managing vendors
  In order to manage vendors
  As an Administrator
  I should be able to see vendors listing

  @ui
  Scenario: Listing vendors
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin
    And There are 5 vendors
    And I am on "/admin"
    When I follow "Vendors"
    Then I should see 5 vendor rows
