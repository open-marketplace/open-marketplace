@order
Feature: Spliting orders when cart was filled with products from different Vendors
  As a customer
  I want to be able to buy products from multiple vendors

  Background:
    Given the store operates on a single channel in "United States"
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
    And I submit form
    And I choose shipment
    And I choose payment
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
    And I submit form
    And I choose shipment
    And I choose payment
    And I complete checkout
    And I am on "en_US/account/orders/"
    Then I should see 1 orders

  @ui
  Scenario: Shipping method requires at least one unit matches, method should be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires at least one unit matches to "Envelope type" shipping category
    And store has 2 products from same Vendor
    And vendor uses this shipping method
    And one of it belongs to "Envelope type" shipping category
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "Envelope"

  @ui
  Scenario: Shipping method requires at least one unit matches, method should not be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires at least one unit matches to "Envelope type" shipping category
    And store has 2 products from same Vendor
    And vendor uses this shipping method
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "There are currently no shipping methods available for your shipping address."

  @ui
  Scenario: Shipping method requires all unit matches, method should be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires that all units match to "Envelope type" shipping category
    And store has 1 products from same Vendor
    And vendor uses this shipping method
    And one of it belongs to "Envelope type" shipping category
    And I have 1 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "Envelope"

  @ui
  Scenario: Shipping method requires all unit matches, method should not be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires that all units match to "Envelope type" shipping category
    And store has 2 products from same Vendor
    And vendor uses this shipping method
    And one of it belongs to "Envelope type" shipping category
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "There are currently no shipping methods available for your shipping address."

  @ui
  Scenario: Shipping method requires none unit matches, method should not be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires that no units match to "Envelope type" shipping category
    And store has 2 products from same Vendor
    And vendor uses this shipping method
    And one of it belongs to "Envelope type" shipping category
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "There are currently no shipping methods available for your shipping address."

  @ui
  Scenario: Shipping method none unit matches, method should be visible scenario
    Given the store has "Envelope type" shipping category
    And the store ships everywhere with Envelope
    And this shipping method requires that no units match to "Envelope type" shipping category
    And store has 2 products from same Vendor
    And vendor uses this shipping method
    And I have 2 products in cart
    And I am on "/en_US/checkout/address"
    And I fill in "sylius_checkout_address[billingAddress][firstName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][lastName]" with "Test name"
    And I fill in "sylius_checkout_address[billingAddress][company]" with "Test company"
    And I fill in "sylius_checkout_address[billingAddress][street]" with "Test street"
    And I select "United States" from "sylius_checkout_address[billingAddress][countryCode]"
    And I fill in "sylius_checkout_address[billingAddress][city]" with "Test city"
    And I fill in "sylius_checkout_address[billingAddress][postcode]" with "Test code"
    And I submit form
    Then I should see "Envelope"
