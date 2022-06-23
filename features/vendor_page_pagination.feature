@vendor_page_pagination
Feature: Paginating vendor products
  In order to see all vendor products
  As an customer
  I can see all paginated products

  Background:
    Given the store operates on a single channel in "United States"
    And there is a user "user@email.com"
    And there is a vendor
    And the vendor has 30 products

  @ui
  Scenario: Attempting to see page number 2
    Given I am on "/en_US/vendor/test-company"
    When I follow "Next"
    Then I should be on "/en_US/vendor/test-company?page=2"
    And I should see a product with name "product-18"
    And the first product should have name "product-10"
    And the last product should have name "product-18"

  @ui
  Scenario: Attempting to change page items limit to 18
    Given I am on "/en_US/vendor/test-company"
    When I follow "18"
    Then I should be on "/en_US/vendor/test-company?limit=18"
    And I should see a product with name "product-1"
    And I should see a product with name "product-18"
    And the first product should have name "product-1"
    And the last product should have name "product-18"
