<?php
namespace Drupal\drupalup_simple_form\Controller;
use Drupal\Core\Controller\ControllerBase;
//namespace Drupal\drupalup_simple_form\Form;


use Drupal\node\Entity\Node;
class CustomnodeController extends ControllerBase{
	public function content() {

		$node = Node::create(['type' => $contentType]);
    $node->langcode = "fr";
    $node->uid = 1;
    $node->promote = 0;
    $node->sticky = 0;
    $node->title= $title;
    $node->body = $body;
    $node->field_1 = $field_1;
$node->save();

$nid = $node->id();

	}


}
?>

