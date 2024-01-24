@vendor_managing_product_listings
Feature:Creating a product listing.
  As a vendor, I need to be able
  to create a product attached to taxons.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store classifies its products as "Caps" and "Shoes"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Creating product listing
    When I am on a dashboard page
    And I follow "Product list"
    And I follow "Create Product"
    And I fill form with default data
    And I choose main taxon "Caps"
    And I click "Save" button
    Then I should see product's listing status "Created"
    And I should see "Product listing created."
