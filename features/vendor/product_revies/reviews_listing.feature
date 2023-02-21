@product_reviews
Feature: Vendor can view reviews of his products
  In order to manage reviews.
  As a Vendor I want to visit page

  Background:
    Given the store operates on a single channel in "United States"
    And the store operates in "Poland"
    And the store has customer "Alex Holand" with email "alex@honnold.pl"
    And there is a "verified" vendor user "kim@jain.pl" registered in country "PL"
    And I am logged in as "kim@jain.pl"
    And There is a product with variant code "Quickdraws-x6" owned by logged in vendor
    And this product has a new review titled "Good" and rated 4 added by customer "alex@honnold.pl"
    And there is a "verified" vendor user "addam@ondra.pl" registered in country "PL"
    And I am logged in as "addam@ondra.pl"
    And There is a product with variant code "Quickdraws-x5" owned by logged in vendor
    And this product has a new review titled "Good" and rated 4 added by customer "alex@honnold.pl"


  @ui
  Scenario: Rendering all reviews of Vendor's product
    When I go to "/en_US/account/vendor/product-reviews"
    Then I should see "1" reviews

  @ui
  Scenario: Rendering all reviews of Vendor's product when there are three different
    Given this product has one review from customer "kim@jain.pl"
    And this product also has review rated 1 which is rejected
    When I go to "/en_US/account/vendor/product-reviews"
    Then I should see "3" reviews