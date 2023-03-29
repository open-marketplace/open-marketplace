@dashboard_statistics
Feature: Viewing dashboard statistics
  As admin user in dashboard panel
  I want to see only statistics correlated with
  secondary orders

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an admin
    And the store has paid order of "Jeans" with total of "$100"

  @ui
  Scenario: Viewing sales summary
    Given I am on "/admin"
    Then I should see "$100" total sales statistic
    And I should see 1 paid order statistic
    And I should see "$100" order avarage price statistic
