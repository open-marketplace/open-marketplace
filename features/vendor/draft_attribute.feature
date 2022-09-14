@draft_attribute
Feature: Vendor can create attributes for product listings

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Creating text type attribute
    When I am on "/en_US/product-attributes/text/new"
    And I fill form with "code" and name with "name" and submit
    Then I should see attribute with "code" and "name" type "Text"
