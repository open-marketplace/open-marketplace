@draft_attribute
Feature: Vendor can create attributes for drafts

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"

  @ui
  Scenario: Creating text type attribute
    Given there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    When I am on "/en_US/product-attributes/text/new"
    And I fill form with "code" and name with "name" and submit
    Then I should see attribute with "code" and "name" type "Text"
