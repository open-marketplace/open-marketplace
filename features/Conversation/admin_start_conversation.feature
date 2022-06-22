@admin_start_conversation
Feature: Starting conversation by Administrator

  Background:
    Given the store operates on a single channel in "United States"
    And there is vendor userName "vendor" with password "vendorpw"

  Scenario: AdminUser begins conversation
    Given I am logged in as an administrator
    And I am on "/admin"
    And print last response
    When I follow "Conversations"
    And  I follow "Create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    Then I should see "test Message"