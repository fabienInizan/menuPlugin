<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_displayMenuEntry implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuEntryId;

		$menuEntryContainer = MenuEntryContainer::getInstance();
		$menuEntry = $menuEntryContainer->getById($id);

		$actionResponse = new ActionResponse_Default();

		$actionResponse->setElement('menuEntry', $menuEntry);

		return $actionResponse;
	}
}

?>
