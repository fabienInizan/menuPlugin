<ul class="context_menu">
	<li><a href="?module=menu&action=displayEditForm&menuId=<?php echo $menu->getId(); ?>">Modifier ce menu</a></li>
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

<form action="?module=menu&action=delete" method="post">
	<input type="hidden" name="menuId" value="<?php echo $menu->getId(); ?>" />

	<h2><?php echo stripslashes($menu->getTitle()); ?></h2>
	<div>
		<p><?php echo stripslashes($menu->getComment()); ?></p>	
	</div>
	
	<p><br /><strong>Êtes-vous certain de vouloir supprimer ce menu ?<br /><br />Attention : Toutes les entrées associées seront également supprimées.</strong></p>

	<button type="submit">Supprimer le menu</button>
</form>
