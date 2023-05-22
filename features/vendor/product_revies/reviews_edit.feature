@product_reviews
Feature: Vendor can edit reviews of his products
  In order to manage reviews.
  As a Vendor I want to edit reviews

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
  Scenario: Editing title of new review of a product
    Given There is a product with variant code "Quickdraws-x5" owned by logged in vendor
    And this product has a new review titled "Good" and rated 4 added by customer "alex@honnold.pl"
    And this product has a new review titled "Good" and rated 4 added by customer "kim@jain.pl"
    And I am on edit page of review added by "kim@jain.pl" to this product
    When I fill in "product_review[title]" with "New title"
    And I click "Save changes"
    Then I should be on "/en_US/account/vendor/product-reviews"
    And this review should have name "New title"

  @ui
  Scenario: Editing comment of accepted review of a product
    Given There is a product with variant code "Quickdraws-x5" owned by logged in vendor
    And this product has a new review titled "The best" and rated 5 added by customer "addam@ondra.pl"
    And this product has one review from customer "alex@honnold.pl"
    And this product has one review from customer "kim@jain.pl"
    And I am on edit page of review added by "kim@jain.pl" to this product
    When I fill in "product_review[comment]" with "New comment"
    And I click "Save changes"
    Then I should be on "/en_US/account/vendor/product-reviews"
    And this review should have comment "New comment"

  @ui
  Scenario: Editing title and comment of rejected review of a product
    Given There is a product with variant code "Quickdraws-x5" owned by logged in vendor
    And this product also has review rated 2 which is rejected
    And this product also has review rated 1 which is rejected
    And this product also has review rated 1 which is rejected
    And I am on edit page of review added by "alex@honnold.pl" to this product
    When I fill in "product_review[title]" with "New title"
    And I fill in "product_review[comment]" with "New comment"
    And I click "Save changes"
    Then I should be on "/en_US/account/vendor/product-reviews"
    And this review should have name "New title"
    And this review should have comment "New comment"
