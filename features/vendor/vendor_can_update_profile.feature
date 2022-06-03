@vendor_dashboard
Feature: Vendor can update his company data
  In order to update company data
  As a vendor
  I want to fill update data form

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "x@x.x" registered in "PL"    
    And I am logged in as "x@x.x"
    
  Scenario: Navigate to form
    When I am on "/en_US/account/dashboard"
    Then I follow "Profile"
    Then I follow "Edit"
    Then I should see "Edit your personal information"
    
  Scenario: Filling the form
    When I am on "/en_US/vendor/profile/update"      
#    Then I should see "Your profile"
    And I fill in "vendor_companyName" with "tfdsfdse"
    And I fill in "vendor_taxIdentifier" with "5fdsfds6"
    And I fill in "vendor_phoneNumber" with "5fdsfds5"
    And I fill in "vendor_vendorAddress_city" with "fdsfsdan"
    And I fill in "vendor_vendorAddress_street" with "efsdfdst"
    And I fill in "vendor_vendorAddress_postalCode" with "dfdsfssfe" 
    And I press "Save changes"
#    And print last response
    Then Pending update data should appear in database
