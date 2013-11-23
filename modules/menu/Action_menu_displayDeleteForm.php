<?php

require_once('core/action/Action.php');
require_once('core/action/ActionResponse_Default.php');
require_once('model/containers/MenuContainer.php');

class Action_menu_displayDeleteForm implements Action
{
	public function run(HttpRequest $httpRequest)
	{
		$id = $httpRequest->menuId;
		
		$actionResponse = new ActionResponse_Default();
		
		if(isset($id))
		{
			$menuContainer = MenuContainer::getInstance();
			$menu = $menuContainer->getById($id);
			
			if(isset($menu))
			{
				$actionResponse->setElement('menu', $menu);				
			}
			else
			{		
				throw new Exception('Le menu demandé n\'existe pas');
			}
		}
		else
		{
			throw new Exception('Le menu demandé n\'existe pas');
		}

		return $actionResponse;
	}
}

?>
