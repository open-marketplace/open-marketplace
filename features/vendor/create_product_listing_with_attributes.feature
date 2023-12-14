@vendor_managing_product_listings
Feature: Creating a product listing with attribute
  and sending it for verification.
  As a vendor, I must be able to create
  a product with a submission for verification.

  Background:
    Given there is an "verified" vendor user "vendor" with password "vendor"
    And the store operates on a channel named "Web-US" in "USD" currency
    And I am logged in as "vendor@email.com"
    And there is draft attribute with code "extended" and type "checkbox"
    And there is draft attribute with code "universal" and type "checkbox"

  @ui
  Scenario: Creating product listing and sending to verification
    Given I am on "/"
    And I follow "My account"
    And I follow "Product list"
    And I follow "Create Product"
    When I fill in "Code" with "productTest"
    And I fill in "Price" with "10"
    And I fill in "Original price" with "20"
    And I fill in "Minimum price" with "30"
    And I fill in "Name" with "test"
    And I fill in "Slug" with "product"
    And I select "extended" from "sylius_product_attribute_choice"
    And I click "Save" button
    And I follow "Product list"
    And I click "Send for verification" button
    And I click "confirmation-button" on confirmation modal
    And I should see "Under verification"
