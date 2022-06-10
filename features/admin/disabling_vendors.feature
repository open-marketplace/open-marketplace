@disabling_vendors
Feature: Disabling vendors
  In order to disable vendor's account
  As an Administrator
  I should be able to click Disable button in vendors listing

  Background:
    Given I am logged in as an administrator
    And I am on "/admin"

  @ui @javascript
  Scenario: Disabling vendor's account
    Given There is a "enabled" vendor
    When I follow "Vendors"
    And I click "Disable"
    And I should see "Confirm your action"
    And I choose "#confirmation-button"
    Then I should see "Vendor's account has been successfully disabled"

  @ui @javascript
  Scenario: Enabling vendor's account
    Given There is a 'disabled' vendor
    When I follow "Vendors"
    And I click "Enable"
    And I should see "Confirm your action"
    And I choose "#confirmation-button"
    Then I should see "Vendor's account has been successfully enabled"

  @ui
  Scenario: Disabling disabled vendor's account
    Given There is a 'disabled' vendor
    When I follow "Vendors"
    Then I should not see "Disable" button

  @ui
  Scenario: Enabling enabled vendor's account
    Given There is a 'enabled' vendor
    When I follow "Vendors"
    Then I should not see "Enable" button

