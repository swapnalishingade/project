<?php
namespace Drupal\drupalup_simple_form\Controller;
//use Drupal\Core\Controller\ControllerBase;
//namespace Drupal\drupalup_simple_form\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
class TestingController{
  public function testing() {

    return array(
      '#theme' => 'testingmodule',
      '#data' => 'Krishna'
    );

    
  }

  public function getEnquiryList()
  {
     $db=\Drupal::database();
     $query =$db->select('news','n');
     $query->fields('n');
     $result = $query->execute()->fetchAll();
     $data=[];
     foreach ($result as $row) {
       $data[]=[
                  
                   'newstitle'=>$row->newstitle,
                 
                   
               ];
     }
    // $header = array('ID','newstitle','newsdesc','date');
     $build['table'] =[
                 '#type'=>'table',
                 //'#header'=>$header,
                 '#rows'=>$data
     ];

     return [
             $build,
             '#title'=>"List"
     ];
  }
}
?>
