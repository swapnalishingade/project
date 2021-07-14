<?php

namespace Drupal\drupalup_simple_form\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Url;
//use Drupal\Component\Render\FormattableMarkup;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "custom_block1",
 *   admin_label = @Translation("Custom block1"),
 *   category = @Translation("Custom block1"),
 * )
 */
class CustomBlock1 extends BlockBase {

  /**
   * {@inheritdoc}
   */
 
    public function build() {
     $db=\Drupal::database();

     $query =$db->select('news','n');
     $query->fields('n');
     $query->range(0,10);
	 $query->orderBy(id, DESC);
     $result = $query->execute()->fetchAll();
     $data=[];
     foreach ($result as $row) {
		 	
       $data[]=[
	   
	   
                 //  'newstitle'=>$row->newstitle,
				   'edit'=>t("<a href='edit/$row->id'>$row->newstitle</a>"),
 // 'newstitle' => new FormattableMarkup('<a href=":edit/$row->id">@newstitle</a>', [':link' => $url, '@newstitle' => $newstitle]),

               ];
     }
    // $header = array('newstitle');
     $build['table'] =[
                 '#type'=>'table',
              //   '#header'=>$header,
                 '#rows'=>$data
			 
     ];

     return [
             $build,
			 
             '#title'=>"Current news"
     ];
	 
  }
  }
  

