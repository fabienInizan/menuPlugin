<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_deleteMenuEntry implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuEntryId;

		$menuEntryContainer = MenuEntryContainer::getInstance();
		$menuEntry = $menuEntryContainer->getById($id);
		
		if(isset($menuEntry))
		{
			$menuEntryContainer->delete($menuEntry);
		}

		header('Location: ?module=menu&action=display&menuId='.$menuEntry->getMenuId());

		return $actionResponse;
	}
}

?>
