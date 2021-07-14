<?php
namespace Drupal\drupalup_simple_form\Controller;
//use Drupal\Core\Controller\ControllerBase;
//namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class TestController{
  public function testing() {

    return array(
      '#theme' => 'testingmodule',
      '#data' => 'Krishna'
    );

    
  }

  public function getEnquiryLists()
  {

     $db=\Drupal::database();

    $query = $db->select('news', 'n')
      ->condition('id', $id)
      ->fields('n');
    $data = $query->execute()->fetchAssoc();
    $id = $data['id'];
    $newstitle = $data['newstitle'];

   

    return [
      '#type' => 'markup',
      '#markup' => "<h1>$id</h1><br>
                 
                    <p>$newstitle</p>"
    ];
}}
?>
