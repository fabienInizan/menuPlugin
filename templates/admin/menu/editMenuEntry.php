<ul class="context_menu">
	<li><a href="index.php?module=menu&action=displayMenuEntry&menuEntryId=<?php echo $menuEntry->getId(); ?>">Retour à l'entrée de menu</a></li>
</ul>

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
<p>L'entrée de menu a été modifiée avec succès !</p>
<?php
	}
?>
