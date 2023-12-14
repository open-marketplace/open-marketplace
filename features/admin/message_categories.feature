@message_category
Feature: Verifying validation of message category
  In order to create new message category
  As an Administrator
  I need to be able to validate message category

  Background:
    Given there is an administrator with name "admin"
    And there is conversation category "test category"

  Scenario: AdminUser begins conversation
    Given I am logged in as an administrator
    And I am on "/admin"
    And I follow "Message categories"
    And I follow "Edit"
    And I fill in "Name" with ""
    When I press "Save changes"
    Then I should see "Required length: 3 characters."
