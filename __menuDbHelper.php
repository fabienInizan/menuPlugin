<?php

require_once('model/containers/Container_Pdo.php');
require_once('model/entities/ActionRestriction.php');
require_once('model/containers/ActionRestrictionContainer.php');
require_once('model/entities/Menu.php');
require_once('model/containers/MenuContainer.php');

class __menuDbHelper extends Container_Pdo
{
	private static $_instance;
	
	private $_actionRestrictionDescriptors = array(
		array(
			'action'=>'add',
			'description'=>'Create a new menu',
			'accessLevel'=>255
		),
		array(
			'action'=>'addMenuEntry',
			'description'=>'Create a new menu entry',
			'accessLevel'=>255
		),
		array(
			'action'=>'delete',
			'description'=>'Delete a menu',
			'accessLevel'=>255
		),
		array(
			'action'=>'deleteMenuEntry',
			'description'=>'Delete a menu entry',
			'accessLevel'=>255
		),
		array(
			'action'=>'display',
			'description'=>'Display a menu',
			'accessLevel'=>0
		),
		array(
			'action'=>'displayAddForm',
			'description'=>'Display the menu creation form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayAddMenuEntryForm',
			'description'=>'Display the menu entry creation form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayDeleteForm',
			'description'=>'Display the menu delete form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayDeleteMenuEntryForm',
			'description'=>'Display the menu entry delete form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayEditForm',
			'description'=>'Display the menu edition form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayEditMenuEntryForm',
			'description'=>'Display the menu entry edition form',
			'accessLevel'=>255
		),
		array(
			'action'=>'displayMenuEntry',
			'description'=>'Display a detailed view of a menu entry',
			'accessLevel'=>255
		),
		array(
			'action'=>'edit',
			'description'=>'Apply modifications to a menu',
			'accessLevel'=>255
		),
		array(
			'action'=>'editMenuEntry',
			'description'=>'Apply modifications to a menu entry',
			'accessLevel'=>255
		),
		array(
			'action'=>'index',
			'description'=>'Display a list of the menus',
			'accessLevel'=>255
		)
	);

	public static function getInstance()
	{
		if(empty(self::$_instance))
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}
	
	public function dbInstall()
	{		
		$query = 'CREATE TABLE IF NOT EXISTS `menu` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`title` varchar(255) NOT NULL,
			`comment` text DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		
		$query = 'CREATE TABLE IF NOT EXISTS `menuEntry` (
			`id` int(11) NOT NULL AUTO_INCREMENT,
			`menuId` int(11) NOT NULL,
			`index` int(11) NOT NULL,
			`entry` varchar(255) NOT NULL,
			`link` varchar(255) NOT NULL,
			`comment` text DEFAULT NULL,
			PRIMARY KEY (`id`)
		) ENGINE=MyISAM DEFAULT CHARSET=latin1';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		
		$actionRestrictionContainer = ActionRestrictionContainer::getInstance();
		$actionRestriction = new ActionRestriction();
		$actionRestriction->setModule('menu');
		
		foreach($this->_actionRestrictionDescriptors as $actionRestrictionDescriptor)
		{
			$actionRestriction->setAction($actionRestrictionDescriptor['action']);
			$actionRestriction->setDescription($actionRestrictionDescriptor['description']);
			$actionRestriction->setAccessLevel($actionRestrictionDescriptor['accessLevel']);
			$actionRestrictionContainer->save($actionRestriction);
		}
	}
	
	public function dbPurge()
	{
		$query = 'DELETE FROM menu';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		
		$query = 'DELETE FROM menuEntry';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
	}
	
	public function dbUninstall()
	{		
		$query = 'DROP TABLE IF EXISTS menu';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		
		$query = 'DROP TABLE IF EXISTS menuEntry';
		
		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		
		$actionRestrictionContainer = ActionRestrictionContainer::getInstance();
		$actionRestrictionContainer->deleteByModule('menu');		
	}
}

?>
