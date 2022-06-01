@blocking_vendors
Feature: Blocking vendors
  In order to block a vendor
  As an Administrator
  I should be able to click Block button in vendors list

  Background:
    Given I am logged in as an administrator
    And I am on "/admin"

  @ui @javascript
  Scenario: Blocking vendors
    Given There is a "unblocked" vendor
    When I follow "Vendors"
    And I click "Block"
    And I should see "Confirm your action"
    And I choose "#confirmation-button"
    And print current URL
    Then I should see "Vendor has been successfully blocked"

  @ui @javascript
  Scenario: Unblocking vendors
    Given There is a 'blocked' vendor
    When I follow "Vendors"
    And I click "Unblock"
    And I should see "Confirm your action"
    And I choose "#confirmation-button"
    Then I should see "Vendor has been successfully unblocked"
