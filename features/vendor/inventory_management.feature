@inventory_management
Feature: Vendor can manage his inventory
  As a Vendor i can track and untrack products
  Also i can change products on hand count

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Setting product tracked
    Given There is product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/inventory_variants"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set tracked
    And I submit inventory form
    Then I should see "12 Available on hand"

  @ui
  Scenario: Setting product untracked
    Given There is product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/inventory_variants"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set untracked
    And I submit inventory form
    Then I should see "Not tracked"
