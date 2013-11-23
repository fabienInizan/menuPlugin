<?php
	if(isset($warning))
	{
?>
<p class="warning"><?php echo $warning; ?></p>
<?php
	}
	else
	{
?>
<ul class="context_menu">
	<li><a href="?module=menu&action=display&menuId=<?php echo $menuEntry->getMenuId(); ?>">Retour au menu</a></li>
</ul>
<?php
	}
?>

<form action="?module=menu&action=addMenuEntry" method="post">
	<input type="hidden" name="menuId" value="<?php echo $menuEntry->getMenuId(); ?>" />
	
	<label class="mandatory">Index (position dans le menu)</label>
	<input type="text" name="index" value="<?php echo stripslashes($menuEntry->getIndex()); ?>" />

	<label class="mandatory">Titre de l'entrée</label>
	<input type="text" name="entry" value="<?php echo stripslashes($menuEntry->getEntry()); ?>" />
	
	<label class="mandatory">Lien cible de l'entrée</label>
	<input type="text" name="link" value="<?php echo stripslashes($menuEntry->getLink()); ?>" />
	
	<label>Commentaire</label>
	<textarea name="comment"><?php echo stripslashes($menuEntry->getComment()); ?></textarea>

	<button type="submit">Ajouter</button>
</form>
