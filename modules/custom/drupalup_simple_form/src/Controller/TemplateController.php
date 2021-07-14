<?php
namespace Drupal\drupalup_simple_form\Controller;
//use Drupal\Core\Controller\ControllerBase;
//namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class TemplateController{
  public function listing() {

    $element = array(
      '#theme' => 'mytemplate',
      '#data' => 'Krishna',
    );
    return $element;

    
  }

  
}
?>
