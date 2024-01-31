@managing_vendors
Feature: Listing vendors
  In order to manage vendors
  As an Administrator
  I should be able to see vendors list

  Background:
    Given There is an admin user "admin" with password "admin"
    And I am logged in as an admin

  @ui
  Scenario: Listing vendors
    Given There are 5 vendors listed
    And I am on "/admin"
    When I follow "Vendors"
    Then I should see 5 vendor rows

  @ui
  Scenario: Vendor details page has link to associated customer
    Given there is an vendor user "vendor" with password "password"
    And I am on "/admin"
    And I follow "Vendors"
    And I follow "Details"
    Then I should see "Shop user"
    And page should contain valid customer "vendor@email.com" link
    And I should see vendors commission data
    And I should see settlement frequency "Weekly"
