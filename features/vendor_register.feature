@vendor_register
Feature: Registration form registers vendor
  In order to create new vendor account
  As an customer
  I can fill registration form

  Background:
    Given the store operates on a single channel in "United States"
    And I am a logged in customer

  Scenario: Attempting to submit empty form
    When I am on "/en_US/vendor/register"
    And I press "Create an account"
    Then I should see "sylius-validation-error" "6" times
    
  Scenario: Fill form with data that fail validation
    When I am on "/en_US/vendor/register"
    And I fill in "vendor_companyName" with "te"
    And I fill in "vendor_taxIdentifier" with "56"
    And I fill in "vendor_phoneNumber" with "55"   
    And I fill in "vendor_vendorAddress_city" with "an"
    And I fill in "vendor_vendorAddress_street" with "et"
    And I fill in "vendor_vendorAddress_postalCode" with "de"
    And I press "Create an account"
    Then I should see "sylius-validation-error" "6" times

  Scenario: Correct completion of the form
    When I am on "/en_US/vendor/register"
    And I fill in "vendor_companyName" with "testCompanyName"
    And I fill in "vendor_taxIdentifier" with "6546546456"
    And I fill in "vendor_phoneNumber" with "555555555"   
    And I fill in "vendor_vendorAddress_city" with "Milan"
    And I fill in "vendor_vendorAddress_street" with "test_street"
    And I fill in "vendor_vendorAddress_postalCode" with "test_postalCode"
    And I press "Create an account"      
    Then I should see "Success"
