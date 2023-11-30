@product_removal_vendor
Feature: Hiding product listing visibility
  As a vendor I can hide product listing

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui @javascript
  Scenario: Deleting product listing
    Given there is 1 product listing created by vendor
    And Product listing status is "Created"
    And I am on "/en_US/account/vendor/product-listings"
    And I open action dropdown
    And I click "Remove" button
    And I confirm my action
    Then I should see "There are no results to display"
