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
    Given There is a "verified" vendor which "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    Then I should see "Vendor requested changes"
    And I should see "Vendor details"
    And I should see "Vendor address"

  @ui
  Scenario: Editing verified vendors which did not requested change of profile
    Given There is a "verified" vendor which "did not requested" change
    When I follow "Vendors"
    And I follow "Edit"
    Then I should see "Vendor details"
    And I should see "Vendor address"
    And I should not see "Vendor requested changes"

  @ui
  Scenario: Editing unverified vendors which requested change of profile
    Given There is a "unverified" vendor which "requested" change
    When I follow "Vendors"
    And I should not see "Edit"

  @ui
  Scenario: Editing unverified vendors which did not requested change of profile
    Given There is a "unverified" vendor which "did not requested" change
    When I follow "Vendors"
    And I should not see "Edit"



