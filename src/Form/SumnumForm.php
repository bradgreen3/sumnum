<?php

/**
  * @file
  * Contains \Drupal\sumnum\Form\SumnumForm.
  */
namespace Drupal\sumnum\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

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
    $form['first_number'] = array(
      '#type' => 'textfield',
      '#title' => t('First Number:'),
    );
    $form['second_number'] = array(
      '#type' => 'textfield',
      '#title' => t('Second Number:'),
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
}
