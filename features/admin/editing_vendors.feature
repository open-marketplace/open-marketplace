@editing_vendors
Feature: Editing Vendors
  In order to edit a vendor
  As an Administrator
  Vendor should be verified
  And I should be able to see Vendor edit page

  Background:
    Given I am logged in as an administrator
    And I am on "/admin"

  @ui
  Scenario: Editing verified vendors which requested change of profile
    Given There is a "verified" vendor which requested change
    When I follow "Vendors"
    And print current URL
    And I click "Edit"
    Then I should see "Vendor requested changes"
    And I should see "Vendor details"
    And I should see "Vendor address"

  @ui
  Scenario: Editing verified vendors which did not requested change of profile
    Given There is a "verified" vendor
    When I follow "Vendors"
    And I click "Edit"
    Then I should see "Vendor details"
    And I should see "Vendor address"
    And I should not see "Vendor requested changes"

