@editing_vendors
Feature: Editing Vendors
  As Administrator I can edit verified Vendor

  Background:
    Given I am logged in as an administrator
    And I am on "/admin"

  @ui
  Scenario: Editing verified Vendor who requested change of profile information
    Given There is a "verified" Vendor who "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And there is an address form filled with: "Warszawa" "22-000" "street"
    And I press "Save changes"
    Then I should see "Vendor has been successfully updated."

  @ui
  Scenario: Editing verified Vendor with empty city
    Given There is a "verified" Vendor who "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And there is an address form filled with: "" "22-000" "Groove street"
    And I press "Save changes"
    Then I should see "This form contains errors."

  @ui
  Scenario: Editing verified Vendor with empty postal code
    Given There is a "verified" Vendor who "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And there is an address form filled with: "Warszawa" "" "Groove street"
    And I press "Save changes"
    Then I should see "This form contains errors."

  @ui
  Scenario: Editing verified Vendor with empty street
    Given There is a "verified" Vendor who "requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And there is an address form filled with: "Warszawa" "22-000" ""
    And I press "Save changes"
    Then I should see "This form contains errors."

  @ui
  Scenario: Editing verified vendors which did not requested change of profile
    Given There is a "verified" Vendor who "did not requested" change
    When I follow "Vendors"
    And I follow "Edit"
    And there is an address form filled with: "Warszawa" "22-000" "Groove street"
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



