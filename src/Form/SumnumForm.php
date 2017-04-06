<?php

/**
  * @file
  * Contains \Drupal\sumnum\Form\SumnumForm.
  */
namespace Drupal\sumnum\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\HtmlCommand;
use Drupal\Core\Ajax\CssCommand;

class SumnumForm extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
  return 'sumnum_form';
 }

  /**
    * {@inheritdoc}.
    */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['#suffix'] = '<span id="sum-message"></span>';
    $form['first_number'] = array(
      '#type' => 'textfield',
      '#title' => t('First Number:'),
      '#ajax' => [
        'callback' => array($this, 'sumNumbersCallback'),
        'event' => 'change',
        'progress' => array(
          'type' => 'throbber',
          'message' => NULL,
        ),
      ],
      '#suffix' => '<span id="first-valid-message"></span>'
    );
    $form['second_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Second Number:'),
      '#ajax' => [
        'callback' => array($this, 'sumNumbersCallback'),
        'event' => 'change',
        'progress' => array(
          'type' => 'throbber',
          'message' => NULL,
        ),
      ],
      '#suffix' => '<span id="second-valid-message"></span>'
   );
    $form['actions']['#type'] = 'actions';
    $form['actions']['submit'] = array(
      '#type' => 'submit',
      '#value' => $this->t('Add'),
      '#button_type' => 'primary',
    );
    return $form;
  }

  /**
    * {@inheritdoc}
    */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    if (is_numeric($form_state->getValue('first_number')) == FALSE) {
      $form_state->setErrorByName('first_number', $this->t('Input must be a valid number'));
    }
    if (is_numeric($form_state->getValue('second_number')) == FALSE) {
      $form_state->setErrorByName('second_number', $this->t('Input must be a valid number'));
    }
  }

  /**
    * {@inheritdoc}
    */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    drupal_set_message($this->t('The sum is @sum', array('@sum' => $form_state->getValue('first_number') + $form_state->getValue('second_number'))));
  }

  /**
    * Ajax callback to sum numbers
    */
  public function sumNumbersCallback(array &$form, FormStateInterface $form_state) {
    $response = new AjaxResponse();

    $message = $form_state->getValue('first_number') + $form_state->getValue('second_number');
    $error_message = $this->t('Input must be a valid number.');

    $first_input = $this->checkFirstInput($form, $form_state);
    $second_input = $this->checkSecondInput($form, $form_state);

    $valid_css = ['border' => '1px solid #ccc'];
    $error_css = ['border' => '2px solid red'];

    // first number input is invalid
    if ($first_input == FALSE) {
      $response->addCommand(new HtmlCommand('#first-valid-message', $error_message));
      $response->addCommand(new CssCommand('#edit-first-number', $error_css));
    } else {
      $response->addCommand(new HtmlCommand('#first-valid-message', ""));
      $response->addCommand(new CssCommand('#edit-second-number', $valid_css));
    }

    // second number input is invalid
    if ($second_input == FALSE) {
      $response->addCommand(new HtmlCommand('#second-valid-message', $error_message));
      $response->addCommand(new CssCommand('#edit-second-number', $error_css));
    } else {
      $response->addCommand(new HtmlCommand('#second-valid-message', ""));
      $response->addCommand(new CssCommand('#edit-second-number', $valid_css));
    }

    // add valid numbers
    $response->addCommand(new HtmlCommand('#sum-message', "Quick Add: $message"));

    return $response;
  }

  /**
    * Checks first number quality
    */
  protected function checkFirstInput(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('first_number') == "") {
      return TRUE;
    } elseif (is_numeric($form_state->getValue('first_number')) == FALSE) {
      return FALSE;
    } else {
      return TRUE;
    }
  }

  /**
    * Checks second number quality
    */
  protected function checkSecondInput(array &$form, FormStateInterface $form_state) {
    if ($form_state->getValue('second_number') == "") {
      return TRUE;
    } elseif (is_numeric($form_state->getValue('second_number')) == FALSE) {
      return FALSE;
    } else {
      return TRUE;
    }
  }


}
