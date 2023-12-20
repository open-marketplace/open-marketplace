@vendor_settlements
Feature: Vendor can manage settlements
  In order to settle my settlements
  As a Vendor
  I want to visit settlements page, filter and accept them

  Background:
    Given the store operates on a channel named "United States"
    And there is a "verified" vendor user "test@company.domain" registered in country with code "US"
    And I am logged in as "test@company.domain"

  @ui
  Scenario: Vendor can see settlements
    Given there is a "new" settlement with total amount of "100.00" and commission amount of "10.00"
    And there is a "accepted" settlement with total amount of "540.00" and commission amount of "74.00"
    And there is a "settled" settlement with total amount of "130.00" and commission amount of "12.71"
    When I visit the vendor settlements page
    Then I should see 3 settlements

  @ui
  Scenario: Vendor can not accept settlements with status other than "New"
    Given there is a "accepted" settlement
    And there is a "settled" settlement
    When I visit the vendor settlements page
    Then I should not see any accept button

  @ui
  Scenario: Vendor can accept new settlements
    Given there is a "new" settlement
    When I visit the vendor settlements page
    And I accept first possible settlement
    And I should see 1 settlements
    Then I should see "Settlement has been accepted successfully."
    And I should see 1 settlements with status "Accepted"
    And I should see 0 settlements with status "New"

  @ui
  Scenario: Vendor can filter settlements by status
    Given there is a "new" settlement with total amount of "100.00" and commission amount of "10.00"
    And there is a "accepted" settlement with total amount of "540.00" and commission amount of "74.00"
    And there is a "accepted" settlement with total amount of "130.00" and commission amount of "12.71"
    When I visit the vendor settlements page
    And I should see 3 settlements
    And I filter settlements by status "Accepted"
    Then I should see 2 settlements
    And I should see 0 settlements with status "New"

  @ui
  Scenario: Vendor can filter settlements by period
    Given there is a settlement with period from "19/11/2023" to "26/12/2023"
    And there is a settlement with period from "27/11/2023" to "03/12/2023"
    And there is a settlement with period from "04/12/2023" to "11/12/2023"
    And there is a settlement with period from "11/12/2023" to "17/12/2023"
    When I visit the vendor settlements page
    And I filter settlements by period "19/11/2023 - 26/12/2023"
    Then I should see 1 settlements
