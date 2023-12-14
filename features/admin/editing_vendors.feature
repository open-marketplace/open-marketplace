@editing_vendors
Feature: Editing Vendors
  In order to edit a Vendor
  As an Administrator
  When Vendor should be verified
  Then I should be able to see Vendor edit page

  Background:
    Given I am logged in as an administrator
    And I am on "/admin"

  @ui
  Scenario: Editing verified Vendor who requested change of profile information
    Given There is a "verified" Vendor who "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And I fill in "vendor_vendorAddress_city" with "Zgorzelec"
    And I fill in "vendor_vendorAddress_postalCode" with "59-900"
    And I fill in "vendor_vendorAddress_street" with "Grove street"
    And I press "Save changes"
    Then I should see "Vendor has been successfully updated."

  @ui
  Scenario: Editing verified vendors which did not requested change of profile
    Given There is a "verified" Vendor who "did not requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And I fill in "vendor_vendorAddress_city" with "Zgorzelec"
    And I fill in "vendor_vendorAddress_postalCode" with "59-900"
    And I fill in "vendor_vendorAddress_street" with "Grove street"
    And I press "Save changes"
    Then I should see "Vendor has been successfully updated."

  @ui
  Scenario: Editing unverified vendors which requested change of profile
    Given There is a "unverified" Vendor who "requested" change
    When I follow "Vendors"
    And I should not see "Edit"

  @ui
  Scenario: Editing unverified vendors which did not requested change of profile
    Given There is a "unverified" Vendor who "did not requested" change
    When I follow "Vendors"
    And I should not see "Edit"



