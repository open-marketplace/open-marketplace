@managing_vendors
Feature: Listing vendors
  In order to manage vendors
  As an Administrator
  I should be able to see vendors list

  @ui
  Scenario: Listing vendors
    Given There is an admin user "admin" with password "admin"
    And I am logged in as an admin
    And There are 5 vendors listed
    And I am on "/admin"
    When I follow "Vendors"
    Then I should see 5 vendor rows
