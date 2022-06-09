@verifying_vendors
Feature: Verifying Vendors account
  In order to verify a vendor
  As an Administrator
  I should be able to see Vendor details page

  @ui
  Scenario: Verifying vendors
    Given I am logged in as an administrator
    And I am on "/admin"
    And There is an unverified Vendor
    When I follow "Vendors"
    And I follow "Details"
    And I follow "Verify"
    Then I should see "Vendor has been successfully verified"
