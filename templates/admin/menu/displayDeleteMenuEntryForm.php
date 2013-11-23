<ul class="context_menu">
	<li><a href="?module=menu&action=displayEditMenuEntryForm&menuEntryId=<?php echo $menuEntry->getId(); ?>">Modifier ce menu</a></li>
	<li><a href="?module=menu&action=display&menuId=<?php echo $menuEntry->getMenuId(); ?>">Retour au menu</a></li>
</ul>

<?php
	if(isset($warning))
	{
?>
<p class="warning"><?php echo $warning; ?></p>
<?php
	}
?>

<form action="?module=menu&action=deleteMenuEntry" method="post">
	<input type="hidden" name="menuEntryId" value="<?php echo $menuEntry->getId(); ?>" />

	<h2><?php echo stripslashes($menuEntry->getentry()); ?></h2>
	<div>
		<?php echo stripslashes($menuEntry->getComment()); ?>
	</div>
	
	<p><strong>Etes-vous certain de vouloir supprimer cette entrée de menu ?</strong></p>

	<button type="submit">Supprimer l'entrée</button>
</form>
