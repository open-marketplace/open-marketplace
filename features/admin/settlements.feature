  @admin_settlements
  Feature: Admin can manage settlements
    In order to settle vendors' settlements
    As an Admin
    I want to visit settlements page and filter them

    Background:
      Given there is an admin user "admin" with password "admin"
      And I am logged in as an administrator
      And there is a "verified" vendor user "bruce@domain.io" registered in country with code "PL" named "Bruce"
      And there is a "verified" vendor user "secondary@example.io" registered in country with code "PL" named "Secondary"
      And the store operates on a channel named "Web-US" in "USD" currency
      And the store operates on a channel named "Web-PL" in "PLN" currency

    @ui
    Scenario: Admin can see settlements
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "bruce@domain.io"
      And there is a "settled" settlement for vendor "bruce@domain.io"
      When I visit the admin settlements page
      Then I should see 3 settlements

    @ui
    Scenario: Admin can filter settlements by status
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "bruce@domain.io"
      And there is a "settled" settlement for vendor "bruce@domain.io"
      When I visit the admin settlements page
      And I should see 3 settlements
      And I filter settlements by status "New"
      Then I should see 1 settlements

    @ui
    Scenario: Admin can filter settlements by period
      Given there is a settlement with period from "19/11/2023" to "26/12/2023"
      And there is a settlement with period from "27/11/2023" to "03/12/2023"
      And there is a settlement with period from "04/12/2023" to "11/12/2023"
      And there is a settlement with period from "11/12/2023" to "17/12/2023"
      When I visit the admin settlements page
      And I filter settlements by period "19/11/2023 - 26/12/2023"
      Then I should see 1 settlements

    @ui
    Scenario: Admin can filter settlements by period
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "secondary@example.io"
      When I visit the admin settlements page
      And I filter settlements by vendor "Bruce"
      Then I should see 1 settlements

    @ui
    Scenario: Admin can filter settlements by channel
      Given there is a settlement for channel "Web-US"
      And there is a settlement for channel "Web-PL"
      When I visit the admin settlements page
      Then I should see 2 settlements
      And I filter settlements by channel "Web-PL"
      Then I should see 1 settlements

    @ui
    Scenario: Admin can clear filters on setllement page
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "secondary@example.io"
      When I visit the admin settlements page
      And I filter settlements by vendor "Bruce"
      And I should see 1 settlements
      Then I clear filters
      And I should see 2 settlements
