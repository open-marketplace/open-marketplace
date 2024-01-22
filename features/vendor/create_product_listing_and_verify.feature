@vendor_managing_product_listings
Feature: Creating a product listing
  and sending it for verification.
  As a vendor, I must be able to create
  a product with a submission for verification.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Creating product listing and sending to verification
    When I am on a dashboard page
    And I follow "Product list"
    And I follow "Create Product"
    And I fill form with default data
    And I click "Save draft" button
    And I follow "Product list"
    And I click "Send for verification" button
    Then I should see product's listing status "Under verification"
    And I should see "Product listing sent to verification."
