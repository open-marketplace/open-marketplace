@order
Feature: Spliting orders if cart was filled with products from different Vendors
  As an customer
  I want to be able to buy products from multiple vendors

  Background:
    Given the store operates on a single channel in "United States"
    And store has 5 products from different vendors
    And there is a customer "customer test" with an email "email@example.com"
    And I am a logged in customer with name "customer test"

  @ui
  Scenario: Picking products from different Vendors
    Given store has 5 products from different Vendors
    And I have 3 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I click "next-step"
    And I click "next-step"
    And I click "next-step"
    And I complete checkout
    And I am on "en_US/account/orders/"
    Then I should see 3 orders

  @ui
  Scenario: Picking products from same Vendor
    Given store has 5 products from same Vendor
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I click "next-step"
    And I click "next-step"
    And I click "next-step"
    And I complete checkout
    And I am on "en_US/account/orders/"
    Then I should see 1 orders
