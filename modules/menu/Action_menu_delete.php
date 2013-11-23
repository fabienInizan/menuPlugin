<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuContainer.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_delete implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuId;

		$menuContainer = MenuContainer::getInstance();
		$menu = $menuContainer->getById($id);
		
		if(isset($menu))
		{
			$menuContainer->delete($menu);
		}
		
		$menuEntryContainer = MenuEntryContainer::getInstance();
		$menuEntries = $menuEntryContainer->getByMenuId($menu->getId());
		
		foreach($menuEntries as $menuEntry)
		{
			$menuEntryContainer->delete($menuEntry);
		}

		$actionResponse = new ActionResponse_Default();
		$actionResponse->setTemplateId('menu/index');

		return $actionResponse;
	}
}

?>
