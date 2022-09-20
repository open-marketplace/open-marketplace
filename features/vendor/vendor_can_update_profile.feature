@vendor_dashboard
Feature: Vendor can update his company information
  In order to update company information
  As a Vendor
  I want to fill update company information form
  I want also confirm update by visiting url with token

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    
  Scenario: Navigating to form
    When I am on "/en_US/account/dashboard"
    Then I follow "Profile"
    Then I follow "Edit"
    Then I should see "Edit your vendor information"

  Scenario: Filling the form
    When I am on "/en_US/vendor/profile/update"
    And I fill in "vendor_companyName" with "Test name"
    And I fill in "vendor_taxIdentifier" with "test identifier"
    And I fill in "vendor_phoneNumber" with "test number"
    And I fill in "vendor_description" with "description"
    And I fill in "vendor_vendorAddress_city" with "City"
    And I fill in "vendor_vendorAddress_street" with "test street"
    And I fill in "vendor_vendorAddress_postalCode" with "22-332"
    And I press "Save changes"
    Then Pending update data should appear in database

  Scenario: Visiting confirmation link
    Given There is pending update data with token value "simpletoken" for logged in vendor
    When I am on "/en_US/vendor/profile-update/simpletoken"
    Then I should see "new ID"
    And I should see "New Company"

  Scenario: Filling the form with logo
    When I am on "/en_US/vendor/profile/update"
    And I fill in "vendor_companyName" with "Test name"
    And I fill in "vendor_taxIdentifier" with "test identifier"
    And I fill in "vendor_phoneNumber" with "test number"
    And I attach the file "images/valid_logo.png" to "vendor_image_file"
    And I fill in "vendor_description" with "description"
    And I fill in "vendor_vendorAddress_city" with "City"
    And I fill in "vendor_vendorAddress_street" with "test street"
    And I fill in "vendor_vendorAddress_postalCode" with "22-332"
    And I press "Save changes"
    Then Pending update data should appear in database

  Scenario: Filling the form with logo that fails validation
    When I am on "/en_US/vendor/profile/update"
    And I fill in "vendor_companyName" with "Test name"
    And I fill in "vendor_taxIdentifier" with "test identifier"
    And I fill in "vendor_phoneNumber" with "test number"
    And I attach the file "images/invalid_logo.png" to "vendor_image_file"
    And I fill in "vendor_description" with "description"
    And I fill in "vendor_vendorAddress_city" with "City"
    And I fill in "vendor_vendorAddress_street" with "test street"
    And I fill in "vendor_vendorAddress_postalCode" with "22-332"
    And I press "Save changes"
    Then I should see "The image width is too small"
    And I should see "Minimum width expected is 100px."

  Scenario: Filling the form with logo that fails file size validation
    When I am on "/en_US/vendor/profile/update"
    And I fill in "vendor_companyName" with "Test name"
    And I fill in "vendor_taxIdentifier" with "test identifier"
    And I fill in "vendor_phoneNumber" with "test number"
    And I attach the file "images/too_big_image.jpg" to "vendor_image_file"
    And I fill in "vendor_description" with "description"
    And I fill in "vendor_vendorAddress_city" with "City"
    And I fill in "vendor_vendorAddress_street" with "test street"
    And I fill in "vendor_vendorAddress_postalCode" with "22-332"
    And I press "Save changes"
    Then I should see "The file is too large"
    And I should see "Allowed maximum size is"

  Scenario: Updating vendor logo
    Given vendor have logo attached to profile
    When I am on "/en_US/vendor/profile/update"
    And I attach the file "images/valid_logo.png" to "vendor_image_file"
    And I press "Save changes"
    And I visit confirmation page
    Then Logo should be updated

  Scenario: Confirmation that form is initialized with right data
    Given there is a "verified" vendor user "test2@company.domain" registered in country "PL"
    And I am logged in as "test2@company.domain"
    And Vendor company name is "Wayne co." tax ID is "testID" phone number is "333 222 000"
    And I am on "/en_US/vendor/profile/update"
    Then I should see form initialized with "Wayne co." "testID" "333 222 000"
