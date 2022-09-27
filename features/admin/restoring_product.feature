@product_removal_admin
Feature: Restoring product listing visibility
  As a administrator i can restore product listing removing by vendor

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is an vendor user "vendor" with password "vendor"
    And I am logged in as an admin
    And there is a vendor user "test@company.domain" registered in country "PL"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Restoring visibility of product listing
    Given there is 1 product listing created by vendor
    And This product listing visibility is removed
    And I follow "Product listings"
    Then I should see "Restore"
    And I click "Restore"
    Then I should not see "Restore"
