@vendor_managing_product_listings
Feature: Creating a product listing
  with Tax Category filled.
  As a vendor, I must be able to create
  a product with a Tax Category for verification.

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "en_US" in "USD" currency
    And there is tax category "Clothing" with code "clothing"
    And there is tax category "Other" with code "other"

  @ui
  Scenario: Creating product listing with a tax category and sending to verification
    When I am on a dashboard page
    And I follow "Product listings"
    And I follow "Create Product listing"
    And I fill form with default data
    And I fill in Tax category with "clothing"
    And I click "Save draft" button
    And I follow "Product listings"
    And I click "Send for verification" button
    And I should see product's listing status "Under verification"
    Then I should see "Product listing sent to verification."

  @ui
  Scenario: Admin accepts product listing with a tax category
    Given There is an under verification product listing created by vendor
    And This product draft has Tax category named "Other"
    And I am logged in as an admin
    And I am on an admin dashboard page
    And I follow "Product listings"
    And I should see 1 product listing
    And I follow "Details"
    And I should see taxCategory "Other" for product listing
    And I click "Accept" button
    And I follow "Products"
    And I follow "Details"
    Then I should see taxCategory "Other" for product listing

  @ui
  Scenario: Admin rejects product listing with a tax category
    Given There is an under verification product listing created by vendor
    And This product draft has Tax category named "Other"
    And I am logged in as an admin
    And I am on an admin dashboard page
    And I follow "Product listings"
    And I should see 1 product listing
    And I follow "Details"
    And I should see taxCategory "Other" for product listing
    And I fill in conversation message content with "reason to reject"
    Then I click "Reject" button

  @ui
  Scenario: Vendor gets the product listing reject message
    Given There is a rejected product listing created by vendor
    And  I am logged in as "vendor@email.com"
    When I am on a dashboard page
    And I am on a conversations page
    Then I should see "Listing with selected tax category was rejected"
