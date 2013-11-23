<h2>Liste des menus</h2>

<ul class="context_menu">	
	<li><a href="?module=menu&amp;action=displayAddForm">Ajouter un menu</a></li>
</ul>

<?php
	if(sizeof($menus) > 0)
	{
?>

<table cellpadding="0" cellspacing="0">
	<thead>
		<tr>
			<th>Titre</th>
			<th colspan="3">Actions</th>
		</tr>
	</thead>
	<tbody>
	<?php 
		foreach($menus as $menu)
		{
	?>
		<tr>
			<td><?php echo stripslashes($menu->getTitle()); ?></td>
			<td><a href="?module=menu&action=display&menuId=<?php echo $menu->getId(); ?>">Voir</a></td>
			<td><a href="?module=menu&action=displayEditForm&menuId=<?php echo $menu->getId(); ?>">Editer</a></td>
			<td><a href="?module=menu&action=displayDeleteForm&menuId=<?php echo $menu->getId(); ?>">Supprimer</a></td>
		</tr>
	<?php
		}
	?>
	</tbody>
</table>

<?php
	}
	else
	{
?>

<p>Aucun menu.</p>

<?php
	}
?>
