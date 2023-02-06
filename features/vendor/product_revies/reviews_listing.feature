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
    Given I am on "/en_US/account/vendor/product-reviews"
    Then I should see "1" reviews

  @ui
  Scenario: Filtering by status
    Given There is a product with variant code "Helmet" owned by logged in vendor
    And this product has one review from customer "alex@honnold.pl"
    And this product has a new review titled "No good" and rated 1 added by customer "kim@jain.pl"
    And I am on "/en_US/account/vendor/product-reviews"
    And I select "New" from "criteria[status]"
    And I click "Filter"
    Then I should see "2" reviews

  @ui
  Scenario: Filtering by rating
    Given There is a product with variant code "Helmet" owned by logged in vendor
    And this product has one review from customer "alex@honnold.pl"
    And this product has a new review titled "No good" and rated 1 added by customer "kim@jain.pl"
    And I am on "/en_US/account/vendor/product-reviews"
    And I select "1" from "criteria[rating]"
    And I click "Filter"
    Then I should see "1" reviews

    When There is a product with variant code "Helmet XL" owned by logged in vendor
    And this product has a new review titled "No good" and rated 1 added by customer "kim@jain.pl"
    And I click "Filter"
    Then I should see "2" reviews
