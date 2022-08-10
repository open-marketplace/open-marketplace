@inventory_management
Feature: Vendor can manage his inventory
  As a Vendor I can set products as tracked and untracked
  Also i can change products on hand count

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Setting a product as tracked
    Given There is a product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/inventory_variants"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set product as tracked
    And I submit inventory form
    Then I should see "12 Available on hand"

  @ui
  Scenario: Setting a product as tracked
    Given There is a product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/inventory_variants"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set product as untracked
    And I submit inventory form
    Then I should see "Not tracked"
