@apero
Feature: Create aperos

  Scenario: Create an apero
    Given i am on "login"
    When I fill in the following:
      | username | Al |
      | password | al |
    When I submit press "Submit"
    Then I should be redirected to "/"
    Then I go to "create"
    When I fill "title" with "titre"
    When I fill "content" with "blablabla"
    When I fill "date" with "2015-02-25"
    When I submit press "Submit"
    Then I should be redirected to "create"
    Then I should message "success"