# sumnum

### Summary

* A simple Drupal module that allows a user to add two numbers together

### Dependencies

* None

### Installation

* Download and extract the sumnum module into your site's modules directory and install via Druapl's UI or by using Drush.

* More info on installing Drupal modules: https://www.drupal.org/node/1897420

### Use

* Install and enable the Sumnum module
* A link to the form will be added to the main navigation, or you can visit it directly at /sumnum/form
* Numbers will be "quick added" below the form, or you can click 'Add' to receive the sum in a beautiful Drupal message
* Only valid integers are accepted. Blank fields or letters are not.

### Known Issues

* Ideally, the "quick add" feature would be triggered without having to click out of the input box. This will likely require some custom JavaScript where a ```setTimeout``` is used to delay the AJAX calls, otherwise ```keyUp``` would trigger the AJAX calls too quickly

### Project Spec

* The module can be enabled and run on any standard Drupal 8 installation without requiring additional modules.
* Create a form implemented using Drupal’s Form API containing at least the following elements.
  * Text input field for a number.
  * A second text input field for a number.
  * A submit button
  * When the form is submitted, it should return the sum of the 2 numbers in a standard Drupal message or elsewhere on the page.
  * Have a normal menu item that can live in the standard navigation or main menu that links to the form.
* Extra credit:
  * Validate the form input to ensure the values are numeric.
  * Use AJAX to show the calculated value when the user is completing the form (in addition to the message on submission).
  * Write an automated test to ensure the numbers are added correctly.
