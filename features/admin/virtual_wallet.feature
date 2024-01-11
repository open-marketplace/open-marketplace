  @admin_virtual_wallets
  Feature: Admin can view virtual wallets
    In order to be able to manage virtual wallets
    As an Admin
    I want to visit virtual wallets page and filter them

    Background:
      Given there is an admin user "admin" with password "admin"
      And I am logged in as an administrator
      And there is a "verified" vendor user "bruce@domain.io" registered in country with code "PL" named "Bruce"
      And there is a "verified" vendor user "secondary@example.io" registered in country with code "PL" named "Secondary"
      And the store operates on a channel named "Web-US" in "USD" currency
      And the store operates on a channel named "Web-EU" in "USD" currency
      And the store has a product "Leprechaun's Gold" priced at "$10.00" in "Web-US" channel
      And the store has a product "Unicorn horn" priced at "$10.00" in "Web-EU" channel

    @ui
    Scenario: Admin can see virtual wallets of all vendors
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-US" with balance "100.92"
      And there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-EU" with balance "14.27"
      When I visit the admin virtual wallets page
      Then I should see 4 virtual wallets

    @ui
    Scenario: Admin can filter virtual wallets by vendor
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I filter virtual wallets by vendor "Bruce"
      Then I should see 1 virtual wallets

    @ui
    Scenario: Admin can filter virtual wallets by channel
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-EU" with balance "43.38"
      And there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I filter virtual wallets by channel "Web-EU"
      Then I should see 2 virtual wallets

    @ui
    Scenario: Admin can sort virtual wallets by channel
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I sort the list by "channel" in "descending" order
      Then I should see virtual wallet for channel "Web-US" first

    @ui
    Scenario: Admin can sort virtual wallets by vendor
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I sort the list by "vendor" in "ascending" order
      Then I should see virtual wallet for vendor "Bruce" first

    @ui
    Scenario: Admin can sort virtual wallets by balance
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I sort the list by "balance" in "ascending" order
      Then I should see virtual wallet for vendor "Bruce" first

    @ui
    Scenario: Admin can clear filters on virtual wallets page
      Given there is a virtual wallet for vendor "bruce@domain.io" and channel "Web-EU" with balance "17.35"
      And there is a virtual wallet for vendor "secondary@example.io" and channel "Web-US" with balance "75.19"
      When I visit the admin virtual wallets page
      And I filter virtual wallets by vendor "Bruce"
      And I clear filter
      Then I should see 2 virtual wallets
