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
}
