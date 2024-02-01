@vendor_managing_product_listings
Feature: Editing a product listing.
  As a vendor, after I have saved new draft of already existing
  product listing, admin must see "Created" status set for this
  product listing.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency
    And there is an admin user "admin" with password "password"
    And the channel uses another locale "pl"

  @ui
  Scenario: Accept product listing
    Given there is 1 product listing created by vendor with status "verified"
    When I am on "/"
    And I follow "My account"
    And I follow "Product listings"
    And I follow "Edit"
    And I fill form with default data
    And I click "Save draft" button
    And I follow "Product listings"
    Then I should see product's listing status "Created"

  @ui
  Scenario: Admin see product listing with status created
    Given there is 1 product listing created by vendor with status "Created"
    And I am logged in as an administrator
    When I am on "/admin"
    And I follow "Product listings"
    Then I should see product's listing status "Created"

