@admin_start_conversation
Feature: After logging in as admin_user
  and switching to the conversation tab,
  the user can contact the vendor

  @ui
  Scenario: AdminUser start conversation
    Given there is an admin userName "admin" with password "admin"
    And there is an vendor userName "vendor" with password "vendor"
    Given I am on "/admin/login"
    When I fill in "Username" with "admin"
    And I fill in "Password" with "admin"
    And I press "Login"
    And I am on "/admin"
    When I follow "Conversations"
    And  I follow "Create"
    When I fill in "Message" with "test Message"
    And I press "Submit"
    Then I should see "test Message"