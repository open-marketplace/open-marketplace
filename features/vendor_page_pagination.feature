@vendor_page_pagination
Feature: Paginating vendor products
  In order to see all vendor products
  As an customer
  I can see all paginated products

  Background:
    Given the store operates on a single channel in "United States"
    And there is a customer account
    And there is a vendor
    And the vendor has 30 products

  Scenario: Attempting to see page number 2
    Given I am on "/en_US/vendor/test-company"
    When I follow "Next"
    Then I should be on "/en_US/vendor/test-company?page=2"

  Scenario: Attempting to change page items limit to 18
    Given I am on "/en_US/vendor/test-company"
    When I follow "18"
    Then I should be on "/en_US/vendor/test-company?limit=18"
