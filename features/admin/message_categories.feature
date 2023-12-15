@messaging
Feature: Verifying validation of message category
  In order to create new message category
  As an Administrator
  I need to be able to validate message category

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin

  @ui
  Scenario: Incorrect message category name
    And I am on "/admin"
    And I follow "Message categories"
    And I follow "Create"
    And I fill in "Name" with ""
    When I click "Create" button
    Then I should see "This value should not be blank."
