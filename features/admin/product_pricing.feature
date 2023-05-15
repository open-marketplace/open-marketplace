@product_pricing
Feature: Product pricing
  As an Administrator
  I need to be able to set product price

  Background:
    And the store operates on a single channel in "United States"
    And the store operates on a channel named "Web-US" in "USD" currency

  @ui
  Scenario: Setting wrong value as price
    Given I am logged in as an administrator
    And the store has a product "testproduct"
    And I am on "/admin/products/"
    And I follow "Edit"
    And I fill in "sylius_product[variant][channelPricings][web_us][price]" with "222222222222222222222222"
    And I click "Save changes"
    Then I should see "This value is not valid."

  @ui
  Scenario: Setting correct value as price
    Given I am logged in as an administrator
    And the store has a product "testproduct"
    And I am on "/admin/products/"
    And I follow "Edit"
    And I fill in "sylius_product[variant][channelPricings][web_us][price]" with "222222"
    And I click "Save changes"
    Then I should see "Success"
