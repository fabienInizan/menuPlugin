<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuContainer.php');

class Action_menu_index implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$menuContainer = MenuContainer::getInstance();
		$menus = $menuContainer->getAll();

		$actionResponse = new ActionResponse_Default();

		$actionResponse->setElement('menus', $menus);

		return $actionResponse;
	}
}

?>
