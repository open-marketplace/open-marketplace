@unverified_vendor_page
Feature: Unverified vendor page
  In order to disable unverified vendor page
  As an customer
  I should be redirected to homepage

  @ui
  Scenario: Redirecting users to homepage when vendor is unverified
    Given the store operates on a single channel in "United States"
    And there is a user "user@email.com"
    And there is a "unverified" vendor
    When I open page "/en_US/vendor/test-company"
    Then I should be on "/en_US/"
