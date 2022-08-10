@customer_dashboard
Feature: Customer can view vendors specific options

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"

  @ui
  Scenario: Showing verified vendor specific options
    Given there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    When I am on "/en_US/account/dashboard"
    Then I should see "Profile" inside sidebar
    And I should not see "Become a Vendor" inside sidebar

  @ui
  Scenario: Showing unverified vendor specific options
    Given there is a "unverified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    When I am on "/en_US/account/dashboard"
    Then I should see "Become a Vendor" inside sidebar
    And I should not see "Profile" inside sidebar

