<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuEntryContainer.php');

class Action_menu_editMenuEntry implements Action
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
				$menuEntry->setMenuId($httpRequest->menuId);
				$menuEntry->setIndex($httpRequest->index);
				$menuEntry->setLink($httpRequest->link);
				$menuEntry->setComment($httpRequest->comment);
				
				$menuEntryContainer->save($menuEntry);
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
