@admin_start_conversation
Feature: Starting conversation by Administrator
  In order to contact with Vendor
  As a admin i want sent message to Vendor

  Background:
    Given there is an administrator with name "admin"
    And the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "test@company.domain" registered in country "PL"
    
  Scenario: AdminUser begins conversation
    Given I am logged in as an administrator
    And I am on "/admin/login"
    And I am on "/admin"
    When I follow "Conversations"
    And  I follow "Create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    Then I should see "test Message"
    
  Scenario: Vendor begins conversation
    Given I am logged in as "test@company.domain"
    And I am on "/vendor/conversation/create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    Then I should see "test Message"

  Scenario: AdminUser begins conversation, and Vendor checks if he received it
    Given I am logged in as an administrator
    And I am on "/admin/login"
    And I am on "/admin"
    And I follow "Conversations"
    And  I follow "Create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    And I am logged in as "test@company.domain"
    And I am on "/vendor/conversations"
    And I follow "Conversation from administrator"
    Then I should see "test Message"

  Scenario: AdminUser begins conversation, and Vendor writes back
    Given I am logged in as an administrator
    And I am on "/admin/login"
    And I am on "/admin"
    And I follow "Conversations"
    And  I follow "Create"
    And I fill in "Message" with "test Message"
    And I press "Submit"
    And I am logged in as "test@company.domain"
    And I am on "/vendor/conversations"
    And I follow "Conversation from administrator"
    And I fill in "Message" with "second test Message"
    And I press "Submit"
    Then I should see "second test Message"