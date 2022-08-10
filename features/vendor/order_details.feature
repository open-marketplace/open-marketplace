@order_details
Feature: Vendor can view order details
  In order to view order details
  As a vendor I want to visit page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Visiting details page
    Given There is order with property "number" with value "55" made with logged in seller
    And I am on order details page
    Then I should see order with number "55"
