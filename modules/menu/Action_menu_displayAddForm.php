<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/entities/Menu.php');

class Action_menu_displayAddForm implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$actionResponse = new ActionResponse_Default();
		
		$title = $httpRequest->title or "";
		$comment = $httpRequest->comment or "";
		
		$menu = new Menu();
		$menu->setTitle($title);
		$menu->setComment($comment);
		
		$actionResponse->setElement('menu', $menu);
		
		return $actionResponse;
	}
}
?>
