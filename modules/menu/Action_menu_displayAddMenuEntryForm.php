<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/entities/MenuEntry.php');

class Action_menu_displayAddMenuEntryForm implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$actionResponse = new ActionResponse_Default();
		
		$id = $httpRequest->menuEntryId or "";
		$menuId = $httpRequest->menuId or "";
		$index = $httpRequest->index or "";
		$link = $httpRequest->link or "";
		$comment = $httpRequest->comment or "";
		
		$menuEntry = new MenuEntry();
		$menuEntry->setId($id);
		$menuEntry->setMenuId($menuId);
		$menuEntry->setIndex($index);
		$menuEntry->setLink($link);
		$menuEntry->setComment($comment);
		
		$actionResponse->setElement('menuEntry', $menuEntry);
		
		return $actionResponse;
	}
}
?>
