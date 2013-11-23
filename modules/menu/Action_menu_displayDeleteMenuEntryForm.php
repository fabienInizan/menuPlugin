<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_displayDeleteMenuEntryForm implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuEntryId;
		
		$actionResponse = new ActionResponse_Default();
		
		if(isset($id))
		{
			$menuEntryContainer = MenuEntryContainer::getInstance();
			$menuEntry = $menuEntryContainer->getById($id);
			
			if(isset($menuEntry))
			{
				$actionResponse->setElement('menuEntry', $menuEntry);				
			}
			else
			{		
				throw new Exception('L\'entrée de menu demandée n\'existe pas');
			}
		}
		else
		{
			throw new Exception('L\'entrée de menu demandée n\'existe pas');
		}

		return $actionResponse;
	}
}

?>
