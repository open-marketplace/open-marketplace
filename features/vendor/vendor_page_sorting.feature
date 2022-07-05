@vendor_page_sorting
Feature: Sorting vendor products
  In order to see vendor products
  As an customer
  I can sort vendor's products

  Background:
    Given the store operates on a single channel in "United States"
    And there is a user "user@email.com"
    And there is a "verified" vendor
    And the vendor has 30 products with different dates and prices

  @ui
  Scenario: Sorting products by their position with ascending order
    Given I am on "/en_US/vendor/test-company"
    When I follow "By position"
    Then the first product should have name "product-1"
    And the last product should have name "product-9"

  @ui
  Scenario: Sorting products by their dates with descending order
    Given I am on "/en_US/vendor/test-company"
    When I follow "Newest first"
    Then the first product should have name "product-30"
    And the last product should have name "product-22"

  @ui
  Scenario: Sorting products by their dates with ascending order
    Given I am on "/en_US/vendor/test-company"
    When I follow "Oldest first"
    Then the first product should have name "product-1"
    And the last product should have name "product-9"

  @ui
  Scenario: Sorting products by their prices with ascending order
    Given I am on "/en_US/vendor/test-company"
    When I follow "Cheapest first"
    Then the first product should have name "product-1"
    And the last product should have name "product-9"

  @ui
  Scenario: Sorting products by their prices with descending order
    Given I am on "/en_US/vendor/test-company"
    When I follow "Most expensive first"
    Then the first product should have name "product-30"
    And the last product should have name "product-22"

  @ui
  Scenario: Sorting products by their names from a to z
    Given I am on "/en_US/vendor/test-company"
    When I follow "From A to Z"
    Then the first product should have name "product-1"
    And the last product should have name "product-17"

  @ui
  Scenario: Sorting products by their names from z to a
    Given I am on "/en_US/vendor/test-company"
    When I follow "From Z to A"
    Then the first product should have name "product-9"
    And the last product should have name "product-29"
