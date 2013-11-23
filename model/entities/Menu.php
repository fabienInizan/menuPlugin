<?php

class Menu
{
	private $_id;
	private $_title;
	private $_comment;

	public function getId()
	{
		return $this->_id;
	}

	public function getTitle()
	{
		return $this->_title;
	}
	
	public function getComment()
	{
		return $this->_comment;
	}

	public function setId($id)
	{
		$this->_id = $id;
	}

	public function setTitle($title)
	{
		$this->_title = $title;
	}
	
	public function setComment($comment)
	{
		$this->_comment = $comment;
	}
}

?>
