@apero
Feature: Create aperos

  Scenario: Create an apero
    Given i am on "login"
    When I fill in the following:
      | username | Al |
      | password | al |
    When I submit press "Submit"
    Then I should be redirected to "home"
    Then I go to "create"
    When I fill "title" with "titre"
    When I fill "content" with "blablabla"
    When I fill "date" with "28-02-2015"
    When I fill "tag" with "5"
    When I submit press "Submit"
    Then I should be redirected on "postCreate"
    Then I should be redirected on "create"
    Then I should message "success"