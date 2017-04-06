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
}
