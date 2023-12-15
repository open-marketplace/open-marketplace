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
    And I am on "/en_US/account/vendor/product-variants/inventory"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set product as tracked
    And I submit inventory form
    Then I should see "12 Available on hand"

  @ui
  Scenario: Setting a product as tracked
    Given There is a product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/account/vendor/product-variants/inventory"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "12"
    And I set product as untracked
    And I submit inventory form
    Then I should see "Not tracked"

  @ui
  Scenario: Setting a product as tracked and order this product
    Given There is a product with variant code "testing_variant_code" owned by logged in vendor
    And I am on "/en_US/account/vendor/product-variants/inventory"
    And I follow "Edit"
    And I fill in "sylius_product_variant[onHand]" with "5"
    And I set product as tracked
    And I submit inventory form
    And I have product "testing_variant_code" in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    And I choose shipment
    And I choose payment
    And I complete checkout
    Then product on hand count should be "4"

    @ui
    Scenario: Setting to big on hand amount
      Given There is a product with variant code "testing_variant_code" owned by logged in vendor
      And I am on "/en_US/account/vendor/product-variants/inventory"
      And I follow "Edit"
      When I fill in "sylius_product_variant[onHand]" with "1000000001"
      And I submit inventory form
      Then I should see "This value should be less than or equal to 1000000000."

