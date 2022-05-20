@Seeing vendo
Feature: Adding a new vendor
  In order to create new vendor account
  As an Administrator
  I want to add vendor to store

  Background:
    Given the store operates on a single channel in "United States"
    And I am logged in as an administrator

  @ui @api
  Scenario: Adding a new vendor
    When I want to create a new vendor
    And I specify its email as "l.skywalker@gmail.com"
    And I specify its name as "Luke"
    And I specify its password as "lightsaber"
    And I add it
    And the vendor "l.skywalker@gmail.com" should appear in the store
