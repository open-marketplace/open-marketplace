@product_reviews
Feature: Vendor can reject reviews of his products
  In order to manage reviews.
  As a Vendor I want to reject reviews

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And the store has customer "Alex Holannd" with email "alex@honnold.pl"
    And there is a "verified" vendor user "kim@jain.pl" registered in country "PL"
    And I am logged in as "kim@jain.pl"
    And There is a product with variant code "Quickdraws-x6" owned by logged in vendor
    And this product has a new review titled "Good" and rated 4 added by customer "alex@honnold.pl"
    And there is a "verified" vendor user "addam@ondra.pl" registered in country "PL"
    And I am logged in as "addam@ondra.pl"


  @ui
  Scenario: Rejecting review of a product
    Given There is a product with variant code "Quickdraws-x5" owned by logged in vendor
    And this product has a new review titled "Good" and rated 4 added by customer "alex@honnold.pl"
    And this product has one review from customer "kim@jain.pl"
    And I am on "/en_US/account/vendor/product-reviews"
    When I click "Reject" first review
    Then this product has 1 "Rejected" reviews