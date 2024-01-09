@messaging
Feature: Verifying validation of message category
  In order to create new message category
  As an Administrator
  I need to be able to validate message category

  Background:
    Given there is an administrator with name "admin"
    And there is conversation category "test category"

  @ui
  Scenario: Incorrect message category name
    Given I am logged in as an administrator
    When I am on "/admin"
    And I follow "Message categories"
    And I follow "Create"
    And I fill in "Name" with ""
    And I press "Create"
    Then I should see "This value should not be blank."

  Scenario: Administrator begins conversation
    Given I am logged in as an administrator
    When I am on "/admin"
    And I follow "Message categories"
    And I follow "Edit"
    And I fill in "Name" with ""
    And I press "Save changes"
    Then I should see "This value should not be blank."
