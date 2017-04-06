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

* It isn't ideal to have AJAX requests fire with each number that is typed. In future iterations, it'd be nice to write some JavaScript that utilizes ```setTimeout``` to delay the AJAX calls.

### Project Spec

*&ast;The module can be enabled and run on any standard Drupal installation without requiring additional modules.*

Create a form implemented using Drupal’s Form API containing at least the following elements:

- [x] Text input field for a number.
- [x] A second text input field for a number.
- [x] A submit button
- [x] When the form is submitted, it should return the sum of the 2 numbers in a standard Drupal message or elsewhere on the page.
- [x] Have a normal menu item that can live in the standard navigation or main menu that links to the form.

Extra credit:
  - [x] Validate the form input to ensure the values are numeric.
  - [x] Use AJAX to show the calculated value when the user is completing the form (in addition to the message on submission).
  - [x] Write an automated test to ensure the numbers are added correctly.
