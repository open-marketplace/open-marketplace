@admin_start_conversation
Feature: Starting conversation by Administrator
  In order to contact with Vendor
  As a admin i want sent message to Vendor

  Background:
    Given there is an administrator with name "admin"
    And there is an vendor userName "vendor" with password "vendor"

  Scenario: AdminUser start conversation
    Given I am logged in as an administrator
    And I am on "/admin/login"
    And I am on "/admin"
    When I follow "Conversations"
    And  I follow "Create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    Then I should see "test Message"