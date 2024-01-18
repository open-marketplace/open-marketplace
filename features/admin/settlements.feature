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
    Scenario: Admin can see settlements of all vendors
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "bruce@domain.io"
      And there is a "settled" settlement for vendor "bruce@domain.io"
      And there is a "new" settlement for vendor "secondary@example.io"
      And there is a "accepted" settlement for vendor "secondary@example.io"
      And there is a "settled" settlement for vendor "secondary@example.io"
      When I visit the admin settlements page
      Then I should see 6 settlements

    @ui
    Scenario: Admin can filter settlements by status
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "bruce@domain.io"
      And there is a "settled" settlement for vendor "bruce@domain.io"
      When I visit the admin settlements page
      And I filter settlements by status "New"
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
      And I filter settlements by channel "Web-PL"
      Then I should see 1 settlements

    @ui
    Scenario: Admin can sort settlements by channel
      Given there is a settlement for channel "Web-US"
      And there is a settlement for channel "Web-PL"
      When I visit the admin settlements page
      And I sort the list by "channel" in "ascending" order
      Then I should see settlement for channel "Web-PL" first

    @ui
    Scenario: Admin can clear filters on setllement page
      Given there is a "new" settlement for vendor "bruce@domain.io"
      And there is a "accepted" settlement for vendor "secondary@example.io"
      When I visit the admin settlements page
      And I filter settlements by vendor "Bruce"
      And I clear settlement filters
      Then I should see 2 settlements
