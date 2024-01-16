@vendor_managing_product_listings
Feature: Creating a product listing
  with Tax Category filled.
  As a vendor, I must be able to create
  a product with a Tax Category for verification.

  Background:
    Given there is an admin user "admin" with password "admin"
    And there is an "verified" vendor user "vendor" with password "vendor"
    And I am logged in as "vendor@email.com"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Creating product listing with a tax category and sending to verification
    Given I am on "/"
    And there is tax category "Clothing" with code "clothing"
    And I follow "My account"
    And I follow "Product list"
    And I follow "Create Product"
    And I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "sylius_product[taxCategory]" with "clothing"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    And I click "Save draft" button
    And I follow "Product list"
    And I click "Send for verification" button
    Then I should see product's listing status "Under verification"
    And I should see "Product listing sent to verification."
    And I am logged in as an admin
    When I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    When I follow "Details"
    Then I should see url "#\/admin\/product-listings\/(\d+)#"
    And I should see taxCategory "Clothing" for product listing

  @ui
  Scenario: Admin accepts product listing with a tax category
    Given I am on "/"
    And there is tax category "Other" with code "other"
    And I follow "My account"
    And I follow "Product list"
    And I follow "Create Product"
    And I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "sylius_product[taxCategory]" with "other"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    And I click "Save draft" button
    And I follow "Product list"
    And I click "Send for verification" button
    Then I should see product's listing status "Under verification"
    And I should see "Product listing sent to verification."
    And I am logged in as an admin
    When I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    And I should see taxCategory "Other" for product listing
    And I click "Accept" button
    And I follow "Products"
    And I follow "Details"
    Then I should see url "#\/admin\/products\/(\d+)#"
    And I should see taxCategory "Other" for product listing

  @ui
  Scenario: Admin rejects product listing with a tax category
    Given I am on "/"
    And there is tax category "Other" with code "other"
    And I follow "My account"
    And I follow "Product list"
    And I follow "Create Product"
    And I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "sylius_product[taxCategory]" with "other"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    And I click "Save draft" button
    And I follow "Product list"
    And I click "Send for verification" button
    Then I should see product's listing status "Under verification"
    And I should see "Product listing sent to verification."
    And I am logged in as an admin
    When I am on "/admin"
    And I follow "Product listings"
    And I should see 1 product listing
    And I follow "Details"
    And I should see url "#\/admin\/product-listings\/(\d+)#"
    And I should see taxCategory "Other" for product listing
    And I fill in "mvm_conversation[messages][__name__][content]" with "reason to reject"
    And I click "Reject" button
    And I am logged in as "vendor@email.com"
    And I am on "/en_US/account/vendor/conversations"
    And I should see "reason to reject"
