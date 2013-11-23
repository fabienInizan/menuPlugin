<?php

require_once('model/containers/Container_Pdo.php');

class MenuEntryContainer extends Container_Pdo
{
	private static $_instance;

	public function getAll()
	{
		$query = 'SELECT * FROM menuEntry';

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$menuEntries = array();
		
		foreach($rows as $row)
		{
			$menuEntries[] = $this->createEntity('MenuEntry', $row);
		}
		
		return $menuEntries;
	}

	public function getById($id)
	{
		$query = 'SELECT * FROM menuEntry WHERE menuEntry.id = :id';

		$params = array('id'=>$id);

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($row))
		{
			throw new Exception('Cannot find required menu entry');
		}

		return $this->createEntity('MenuEntry', $row);
	}
	
	public function getByMenuId($menuId)
	{
		$query = 'SELECT * FROM menuEntry WHERE menuEntry.menuId = :menuId ORDER BY menuEntry.index';

		$params = array('menuId'=>$menuId);

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$menuEntries = array();
		
		foreach($rows as $row)
		{
			$menuEntries[] = $this->createEntity('MenuEntry', $row);
		}

		return $menuEntries;
	}

	public static function getInstance()
	{
		if(empty(self::$_instance))
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function save(MenuEntry $menuEntry)
	{
		$id = $menuEntry->getId();

		if(!empty($id))
		{
			$query = 'UPDATE menuEntry SET menuEntry.menuId = :menuId, menuEntry.index = :index, menuEntry.entry = :entry, menuEntry.link = :link, menuEntry.comment = :comment WHERE menuEntry.id = :id';

			$params = array('id'=>$menuEntry->getId(),
							'menuId'=>$menuEntry->getMenuId(),
							'index'=>$menuEntry->getIndex(),
							'entry'=>$menuEntry->getEntry(),
							'link'=>$menuEntry->getLink(),
							'comment'=>$menuEntry->getComment());
		}
		else
		{
			$query = 'INSERT INTO `menuEntry`(`menuId`, `index`, `entry`, `link`, `comment`) VALUES(:menuId, :index, :entry, :link, :comment)';

			$params = array('menuId'=>$menuEntry->getMenuId(),
							'index'=>$menuEntry->getIndex(),
							'entry'=>$menuEntry->getEntry(),
							'link'=>$menuEntry->getLink(),
							'comment'=>$menuEntry->getComment());
		}

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
		
		if(empty($id))
		{
			$menuEntry->setId($this->getPdo()->lastInsertId());
		}
	}

	public function delete(MenuEntry $menuEntry)
	{
		$query = 'DELETE FROM menuEntry WHERE menuEntry.id = :id';

		$params = array('id'=>$menuEntry->getId());

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
	}
}

?>
