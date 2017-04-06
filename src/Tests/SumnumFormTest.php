<?php

/**
 * @file
 * Contains \Drupal\sumnum\Tests\SumnumFormTest.
 */

namespace Drupal\sumnum\Tests;

use Drupal\simpletest\WebTestBase;

/**
 *
 * @group sumnum
 */
class SumnumFormTest extends WebTestBase {

  /**
   * Modules to install.
   * @var array
   */
  public static $modules = ['node', 'sumnum'];

  /**
   * Tests that 'sumnum/form' returns a 200 OK response.
   */
  public function testSumnumFormURLIsAccessible() {
    $this->drupalGet('sumnum/form');
    $this->assertResponse(200);
  }

  /**
   * Tests that the form has a submit button to use.
   */
  public function testSumnumFormSubmitButtonExists() {
    $this->drupalGet('sumnum/form');
    $this->assertResponse(200);
    $this->assertFieldById('edit-submit');
  }

  /**
   * Test that correct options are present in form.
   */
  public function testSumnumFormFieldOptionsExist() {
    $this->drupalGet('sumnum/form');
    $this->assertResponse(200);

    // check that our select field displays on the form
    $this->assertFieldByName('first_number');
    $this->assertFieldByName('second_number');

    // check only two fields exist
    $this->assertNoFieldByName('third_number');
  }

  /**
   * Test the submission of the form.
   * @throws \Exception
   */
  public function testSumnumFormSubmitHappy() {
    // submit the form with 2 + 5
    $this->drupalPostForm(
      'sumnum/form',
      array(
        'first_number' => '2',
        'second_number' => '5'
      ),
      t('Add')
    );
    // should see the correct solution
    $this->assertUrl('sumnum/form');
    $this->assertText('The sum is 7');
  }
  public function testSumnumFormSubmitSad() {
    // submit the form with two + 5
    $this->drupalPostForm(
      'sumnum/form',
      array(
        'first_number' => 'two',
        'second_number' => '5'
      ),
      t('Add')
    );
    // should see error message
    $this->assertUrl('sumnum/form');
    $this->assertText('Input must be a valid number');
  }
}
