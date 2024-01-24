@admin_settlements_frequency
Feature: Admin can manage settlements frequency
  In order to settle vendors' settlements
  As an Admin
  I want to be able to change settlement frequency and to see compensatory settlements

  Background:
    Given there is an admin user "admin" with password "admin"
    And I am logged in as an administrator
    And there is a "verified" vendor user "bruce@domain.io" registered in country with code "PL" named "Bruce"
    And vendor "bruce@domain.io" was created on "2022-11-11 00:00:00"
    And the store operates on a channel named "Web-US" in "USD" currency
    And the store operates on a channel named "Web-EU" in "USD" currency
    And the store has a product "Leprechaun's Gold" priced at "$10.00" in "Web-US" channel
    And the store has a product "Unicorn horn" priced at "$10.00" in "Web-EU" channel
    And vendor "bruce@domain.io" has an order with number "US-BRUCE-1" priced at "$20.00" in channel "Web-US"
    And vendor "bruce@domain.io" has an order with number "EU-BRUCE-1" priced at "$100.00" in channel "Web-EU"

  @ui
  Scenario: Admin can generate compensatory settlement frequency when changing from cyclical to non-cyclical
      Given vendor "bruce@domain.io" has "Weekly" settlement frequency
      And order "US-BRUCE-1" has been included in previously generated settlement
      And order "EU-BRUCE-1" has been paid in current settlement cycle
      And I am on admin vendor listing page
      When I click edit button for "Bruce"
      And I set settlement frequency to "Virtual wallet"
      And I submit vendor update form
      And I visit the admin settlements page
      Then I should see 2 settlement for vendor "Bruce"
      And I should see 1 settlement with today as end of settlement period
      And I should see 1 settlement with different day as end of settlement period

  @ui
  Scenario: Admin can generate compensatory settlement frequency when changing from non-cyclical to cyclical
    Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-US" with balance "100.92"
    And there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "59.72"
    And vendor "bruce@domain.io" has "Virtual wallet" settlement frequency
    And I am on admin vendor listing page
    When I click edit button for "Bruce"
    And I set settlement frequency to "Weekly"
    And I submit vendor update form
    And I visit the admin settlements page
    And I filter settlements by vendor "Bruce"
    Then I should see 2 settlement for vendor "Bruce"
    And I should see settlement total with amount of "100.92" for "Web-US" channel
    And I should see settlement total with amount of "59.72" for "Web-EU" channel

  @ui
  Scenario: Admin can clear virtual wallets when changing from non-cyclical to cyclical
    Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-US" with balance "100.92"
    Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "59.72"
    And vendor "bruce@domain.io" has "Virtual wallet" settlement frequency
    And I am on admin vendor listing page
    When I click edit button for "Bruce"
    And I set settlement frequency to "Weekly"
    And I submit vendor update form
    And I visit the admin settlements page
    And I filter settlements by vendor "Bruce"
    Then I visit the admin virtual wallets page
    And I filter virtual wallets by vendor "Bruce"
    And I should see 2 virtual wallets
    And I should see "0.00" as balance for "Web-US" channel
    And I should see "0.00" as balance for "Web-EU" channel

  @ui
  Scenario: Admin can generate compensatory settlement when changing from longer to shorter settlement frequency
    Given vendor "bruce@domain.io" has "Monthly" settlement frequency
    And order "EU-BRUCE-1" has been paid at the beginning of current settlement cycle
    And I am on admin vendor listing page
    When I click edit button for "Bruce"
    And I set settlement frequency to "Weekly"
    And I submit vendor update form
    And I visit the admin settlements page
    Then I should see 1 settlement for vendor "Bruce"
    And I should see 1 settlement with today as end of settlement period
    And I should see settlement total with amount of "100.00" for "Web-EU" channel

  @ui
  Scenario: Admin can generate compensatory settlement when changing from shorter to longer settlement frequency
    Given vendor "bruce@domain.io" has "Weekly" settlement frequency
    And order "EU-BRUCE-1" has been paid at the beginning of current settlement cycle
    And I am on admin vendor listing page
    When I click edit button for "Bruce"
    And I set settlement frequency to "Monthly"
    And I submit vendor update form
    And I visit the admin settlements page
    Then I should see 1 settlement for vendor "Bruce"
    And I should see 1 settlement with today as end of settlement period
    And I should see settlement total with amount of "100.00" for "Web-EU" channel
