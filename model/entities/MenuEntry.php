<?php

class MenuEntry
{
	private $_id;
	private $_menuId;
	private $_index;
	private $_entry;
	private $_link;
	private $_comment;

	public function getId()
	{
		return $this->_id;
	}
	
	public function getMenuId()
	{
		return $this->_menuId;
	}
	
	public function getIndex()
	{
		return $this->_index;
	}

	public function getEntry()
	{
		return $this->_entry;
	}

	public function getLink()
	{
		return $this->_link;
	}
	
	public function getComment()
	{
		return $this->_comment;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}
	
	public function setMenuId($menuId)
	{
		$this->_menuId = $menuId;
	}
	
	public function setIndex($index)
	{
		$this->_index = $index;
	}

	public function setEntry($entry)
	{
		$this->_entry = $entry;
	}

	public function setLink($link)
	{
		$this->_link = $link;
	}
	
	public function setComment($comment)
	{
		$this->_comment = $comment;
	}
}

?>
