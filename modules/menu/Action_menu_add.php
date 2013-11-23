<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuContainer.php');
require_once('model/entities/Menu.php');

class Action_menu_add implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$actionResponse = new ActionResponse_Default();
		
		$title = $httpRequest->title;
		$comment = $httpRequest->comment or "";
		
		if(isset($title))
		{		
			$menuContainer = MenuContainer::getInstance();
			
			$menu = new Menu();
			$menu->setTitle($title);
			$menu->setComment($comment);
			$menuContainer->save($menu);		
		}
		else
		{
			$actionResponse->setElement('warning', 'Le champ de titre est obligatoire.');
			$actionResponse->setTemplateId('menu/displayAddForm');
		}

		return $actionResponse;
	}
}

?>
