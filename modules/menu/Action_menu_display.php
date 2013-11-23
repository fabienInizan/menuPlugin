<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuContainer.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_display implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuId;

		$menuContainer = MenuContainer::getInstance();
		$menu = $menuContainer->getById($id);

		$actionResponse = new ActionResponse_Default();

		$actionResponse->setElement('menu', $menu);
		
		$menuEntryContainer = MenuEntryContainer::getInstance();
		$menuEntries = $menuEntryContainer->getByMenuId($id);
		
		$actionResponse->setElement('menuEntries', $menuEntries);

		return $actionResponse;
	}
}

?>
