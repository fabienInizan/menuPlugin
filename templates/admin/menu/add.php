<ul class="context_menu">
	<li><a href="index.php?module=menu">Retour aux menus</a></li>
</ul>

<?php
	if(!empty($warning))
	{
?>
<p class="warning"><?php echo $warning; ?></p>
<?php
	}
	else
	{
?>
<p>Le menu a été ajouté avec succès !</p>
<?php
	}
?>
