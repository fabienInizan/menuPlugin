<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuEntryContainer.php');
require_once('model/entities/MenuEntry.php');

class Action_menu_addMenuEntry implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$actionResponse = new ActionResponse_Default();
		
		$menuId = $httpRequest->menuId;
		$index = $httpRequest->index;
		$entry = $httpRequest->entry;
		$link = $httpRequest->link;
		$comment = $httpRequest->comment or "";
		
		$menuEntry = new MenuEntry();
		$menuEntry->setMenuId($menuId);
		$menuEntry->setIndex($index);
		$menuEntry->setEntry($entry);
		$menuEntry->setLink($link);
		$menuEntry->setComment($comment);

		$actionResponse->setElement('menuEntry', $menuEntry);

		if(is_numeric($menuId) && ($menuId >= 0) && is_numeric($index) && ($index >= 1) && isset($entry) && isset($link))
		{
			$menuEntryContainer = MenuEntryContainer::getInstance();			
			$menuEntryContainer->save($menuEntry);	
		}
		else
		{
			$actionResponse->setElement('warning', 'Tous les champs obligatoires n\'ont pas été remplis ! (l\'index doit être supérieur ou égal à 1)');
			$actionResponse->setTemplateId('menu/displayAddMenuEntryForm');
		}

		return $actionResponse;
	}
}

?>
