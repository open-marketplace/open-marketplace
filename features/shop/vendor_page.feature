@vendor_page
Feature: Displaying vendor page
  As a customer
  I want to be able to visit vendor page

  Background:
    Given the store operates on a single channel in "United States"

  @ui
  Scenario: Viewing vendor products
    Given store has 5 products from same vendor
    Then I should see "5" products in the list

  @ui
  Scenario: Paginating vendor products
    Given store has 3 products from same vendor
    And Pagination is set to display "2" orders per page
    Then I should see 2 products on page "1"
    And I should see 1 products on page "2"

  @ui
  Scenario: Displaying only current vendor products
    Given store has 5 products from different Vendors
    And I should see 1 products on page "1"
