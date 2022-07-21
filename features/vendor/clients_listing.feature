@clients_listing
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
