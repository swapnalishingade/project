<?php

namespace Drupal\drupalup_simple_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "custom_block",
 *   admin_label = @Translation("Custom block"),
 *   category = @Translation("Custom block"),
 * )
 */
class CustomBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
 
    public function build() {
     $form = \Drupal::formBuilder()->getForm('Drupal\drupalup_simple_form\Form\SimpleForm');
    return $form;
  }
  

}