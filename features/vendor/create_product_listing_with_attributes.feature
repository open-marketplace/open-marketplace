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
    When I am on a dashboard page
    And I follow "Product list"
    And I follow "Create Product"
    And I fill form with default data
    And I select "extended" from "sylius_product_attribute_choice"
    And I click "Save" button
    And I follow "Product list"
    And I click "Send for verification" button
    And I click "confirmation-button" on confirmation modal
    Then I should see "Under verification"
