@order_viewing
Feature: Hiding primary orders in order list view
  As an administrator
  During orders list view
  I cannot see primary orders

  Background:
    Given I am logged in as an administrator
    And the store has currency "EUR"
    And the store has currency "GBP"
    And the store operates on a channel named "Web-EU" in "EUR" currency and with hostname "web-eu"
    And that channel allows to shop using "EUR" and "GBP" currencies
    And the store has country "Ireland"
    And the store has a product "Leprechaun's Gold" priced at "€10.00" in "Web-EU" channel
    And the store has a zone "EU"
    And the store has customer "example@user.com"
    And the store has "UPS" shipping method with "$20.00" fee per unit for "Web-EU" channel
    And the store has also a payment method "Bank transfer" with a code "transfer"
    And store has primary and secondary order with payment state "paid"

  @ui
  Scenario: Viewing sales summary
    Given I am on "/admin"
    And I follow "Orders"
    Then I should see 1 secondary order
