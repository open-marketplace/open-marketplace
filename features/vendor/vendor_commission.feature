@vendor_commission
Feature: In case of creating the order
  I want the commission to be automatically calculated

  Background:
    Given the store operates on a single channel in "United States"
    And there is a customer "customer test" with an email "email@example.com"
    And I am a logged in customer with name "customer test"

  @ui
  Scenario: Picking products from different Vendors with default commission settings
    Given store has 5 products from different Vendors with default commission settings
    And I have 3 products in cart
    And I finalize order
    Then commission should be calculated for each secondary order
    And commissions should not be calculated for primary orders

  @ui
  Scenario: Viewing commission in admin order summary
    Given store has 5 products from same Vendor
    And I have 3 products in cart
    And I finalize order
    And I am logged in as an administrator
    And I am on "/admin"
    And I follow "Orders"
    And I follow "Show"
    Then I should see valid commission information's

  @ui
  Scenario: Viewing commission in admin order summary for order without vendor
    Given store has 5 products created by admin
    And I have 3 products in cart
    And I finalize order
    And I am logged in as an administrator
    And I am on "/admin"
    And I follow "Orders"
    And I follow "Show"
    Then I should see no commission

  @ui
  Scenario: Viewing commission in vendor order summary
    Given there is a vendor user "test@company.domain" registered in country "PL"
    And store has 5 products from vendor "test@company.domain"
    And I have 3 products in cart
    And I finalize order
    And I am logged in as "test@company.domain"
    And I am on "en_US/account"
    And I follow "My account"
    And I follow "Orders"
    And I follow "Show"
    Then I should see valid commission information's

  @ui
  Scenario: Trying to set negative commission
    Given there is a vendor user "test@company.domain" registered in country "PL"
    And I am logged in as an administrator
    And I am on "/admin"
    And I follow "Vendors"
    And I follow "Edit"
    And I fill in "Commission" with "-10"
    And I click "Save changes" button
    Then I should get commission value validation error

  @ui
  Scenario: Picking products from different Vendors with random commission settings
    Given store has 2 products from different Vendors with random commission settings
    And I have 2 products in cart
    And I finalize order
    Then every secondary order should have valid commission total
