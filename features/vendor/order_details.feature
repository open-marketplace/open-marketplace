@order_details
Feature: Vendor can update his company information
  In order to update company information
  As a Vendor
  I want to fill update company information form
  I want also confirm update by visiting url with token

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Visiting details page
    Given There is order with property "number" with value "55" made with logged in seller
    And I am on order details page
    Then I should see "55"
