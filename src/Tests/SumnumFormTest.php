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
  public function testExperimentFormSubmitButtonExists() {
    $this->drupalGet('sumnum/form');
    $this->assertResponse(200);
    $this->assertFieldById('edit-submit');
  }

  /**
   * Test that correct options are present in form.
   */
  public function testExperimentFormFieldOptionsExist() {
    $this->drupalGet('sumnum/form');
    $this->assertResponse(200);

    // check that our select field displays on the form
    $this->assertFieldByName('first_number');
    $this->assertFieldByName('second_number');

    // check only two fields exist
    $this->assertNoFieldByName('third_number');
  }
}
