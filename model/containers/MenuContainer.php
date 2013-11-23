<?php

require_once('model/containers/Container_Pdo.php');

class MenuContainer extends Container_Pdo
{
	private static $_instance;

	public function getAll()
	{
		$query = 'SELECT * FROM menu';

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute();
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

		$menus = array();
		
		foreach($rows as $row)
		{
			$menus[] = $this->createEntity('Menu', $row);
		}
		
		return $menus;
	}

	public function getById($id)
	{
		$query = 'SELECT * FROM menu WHERE menu.id = :id';

		$params = array('id'=>$id);

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		if (empty($row))
		{
			throw new Exception('Cannot find required menu');
		}

		return $this->createEntity('Menu', $row);
	}

	public static function getInstance()
	{
		if(empty(self::$_instance))
		{
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	public function save(Menu $menu)
	{
		$id = $menu->getId();

		if(!empty($id))
		{
			$query = 'UPDATE menu SET menu.title = :title, menu.comment = :comment WHERE menu.id = :id';

			$params = array('id'=>$menu->getId(),
							'title'=>$menu->getTitle(),
							'comment'=>$menu->getComment());
		}
		else
		{
			$query = 'INSERT INTO menu(title, comment) VALUES(:title, :comment)';

			$params = array('title'=>$menu->getTitle(),
							'comment'=>$menu->getComment());
		}

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
		
		if(empty($id))
		{
			$menu->setId($this->getPdo()->lastInsertId());
		}
	}

	public function delete(Menu $menu)
	{
		$query = 'DELETE FROM menu WHERE menu.id = :id';

		$params = array('id'=>$menu->getId());

		$stmt = $this->getPdo()->prepare($query);
		$stmt->execute($params);
	}
}

?>
