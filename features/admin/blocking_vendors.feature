@blocking_vendors
Feature: Blocking vendors
  In order to block a vendor
  As an Administrator
  I should be able to click Block button in vendors list

  Background:
    Given There is an admin user "admin" with password "admin"
    And I am logged in as an admin
    And I am on "/admin"

  @ui
  Scenario: Blocking vendors
    Given There is an unblocked vendor
    And print last response
    When I follow "Vendors"
    And I click "Block"
    And I should see "Confirm your action"
    And I choose "div:contains('Yes')"
    Then I should see "Vendor has been successfully blocked"

  @ui
  Scenario: Unblocking vendors
    Given There is a blocked vendor
    When I follow "Vendors"
    And I click "Unblock"
    And I should see "Confirm your action"
    And I follow "Yes"
    Then I should see "Vendor has been successfully unblocked"
