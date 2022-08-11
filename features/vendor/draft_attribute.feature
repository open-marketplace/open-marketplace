@draft_attribute
Feature: Vendor can create attributes for drafts

  Background:
    Given the store operates on a single channel in "United States"
#    And the store has locale "en_US"
    And the store operates in "Poland"

  @ui
  Scenario: Creating text type attribute
    Given there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    When I am on "/en_US/product-attributes/text/new"
    And I fill form with "code" and name with "name" and submit
    Then I should see attribute with "code" and "name" type "Text"

  @ui
  Scenario: Adding attribute to product draft
    Given there is a "verified" vendor user "test@company.domain" registered in country "PL"
    And I am logged in as "test@company.domain"
    And I have Attribute type "text" name "name" code "code"
    And I am on "/en_US/vendor/product-listings/create"
    And I fill product draft form
#    And I am on "/en_US/attributes"
    And I pick attribute
    And print last response
