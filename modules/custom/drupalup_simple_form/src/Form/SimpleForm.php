<?php
namespace Drupal\drupalup_simple_form\Form;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Database\Database;
use Drupal\Core\Url;

class SimpleForm extends FormBase {

  /**
   * Returns a unique string identifying the form.
   *
   * The returned ID should be a unique string that can be a valid PHP function
   * name, since it's used in hook implementation names such as
   * hook_form_FORM_ID_alter().
   *
   * @return string
   *   The unique string identifying the form.
   */
  public function getFormId() {
    return 'drupalup_simple_form';
  }



   /**
   * Form constructor.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   *
   * @return array
   *   The form structure.
   */
  public function buildForm(array $form, FormStateInterface $form_state) {





$form['newstitle'] = [
      '#type' => 'textfield',
      '#title' => $this->t('News Title'),
      '#newstitle' => $this->t('newstitle'),
  
    ];








$form['newsdesc'] = [
      '#type' => 'textarea',
      '#title' => $this->t('Description'),
      '#newsdesc' => $this->t('newsdesc'),
  
    ];

  $form['date'] = array(
'#type' => 'date',
'#title' => t('Preferred Date of Program'),
//'#default_value' => ,
'#description' => t(''),
'#required' => TRUE
);


    // Group submit handlers in an actions element with a key of "actions" so
    // that it gets styled correctly, and so that other modules may add actions
    // to the form. This is not required, but is convention.
    $form['actions'] = [
      '#type' => 'actions',
    ];

    // Add a submit button that handles the submission of the form.
    $form['actions']['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
      '#button_type' => 'primary',
    ];

    return $form;

  }

  /**
   * Validate the title and the checkbox of the form
   * 
   * @param array $form
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   * 
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);

   $name = $form_state->getValue('pname');
    $mobile = $form_state->getValue('mobile');
    $date = $form_state->getValue('date');
    $short_complaint = $form_state->getValue('short_complaint');
    $complaint_description = $form_state->getValue('complaint_description');
  
    if (strlen($name) < 0) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('pname', $this->t('Please enter Name'));
    }

     if (strlen($mobile) < 0) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('mobile', $this->t('Please enter Mobile'));
  
  }
  if (strlen($short_complaint) < 0) {
    // Set an error for the form element with a key of "title".
    $form_state->setErrorByName('short_complaint', $this->t('Please enter Short Complaint'));

}

}
  /**
   * Form submission handler.
   *
   * @param array $form
   *   An associative array containing the structure of the form.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The current state of the form.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

  //  echo "<pre>"; 
  
    $postdata=$form_state->getValues();
  
    $postdata=$form_state->getValues();
     unset($postdata['submit'],$postdata['form_build_id'],$postdata['form_token'],$postdata['form_id'],$postdata['op']);
     //echo "<pre>";
    // print_r($postdata);die();
    $query = \Drupal::database();
   $query->insert('news')->fields($postdata)->execute();
  drupal_set_message("succesfully saved");
    // Redirect to home
   $form_state->setRedirect('<front>');

  } 

  /*public function getEnquiryList()
  {
     $db=\Drupal::database();
     $query =$db->select('news','be');
     $query->fields('be');
     $result = $query->execute()->fetchAll();
     $data=[];
     foreach ($result as $row) {
       $data[]=[
                   'id'=>$row->id,
                   'book_title'=>$row->book_title,
                   'book_description'=>$row->book_description,
                   'email_id'=>$row->email_id,
                   'location'=>$row->location,
                   'zipcode'=>$row->zipcode
               ];
     }
     $header = array('id','book_title','book_description','email_id','location','zipcode');
     $build['table'] =[
                 '#type'=>'table',
                 '#header'=>$header,
                 '#rows'=>$data
     ];

     return [
             $build,
             '#title'=>"Enquiry Form List"
     ];
  }  */

}
?>