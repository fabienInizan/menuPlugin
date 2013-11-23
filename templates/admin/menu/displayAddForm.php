<ul class="context_menu">
	<li><a href="?module=menu">Retour aux menus</a></li>
</ul>

<?php
	if(isset($warning))
	{
?>
<p class="warning"><?php echo $warning; ?></p>
<?php
	}
?>

<form action="?module=menu&action=add" method="post">
	<label class="mandatory">Titre</label>
	<input type="text" name="title" value="<?php echo stripslashes($menu->getTitle()); ?>" />

	<label>Commentaire</label>
	<textarea name="comment"><?php echo stripslashes($menu->getComment()); ?></textarea>

	<button type="submit">Ajouter</button>
</form>
