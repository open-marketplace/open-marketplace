@product_removal_vendor
Feature: Hiding product listing visibility
  As a vendor i can hide product listing

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Deleting product listing
    Given there is 1 product listing created by vendor
    And Product listing status is "Created"
    And I am on "/en_US/vendor/product-listings"
    Then I should see "Delete"
    And I click "Delete" button
    Then I should not see "Delete"
