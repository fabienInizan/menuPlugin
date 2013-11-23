<ul class="context_menu">
	<li><a href="?module=menu&action=displayEditForm&menuId=<?php echo $menu->getId(); ?>">Modifier</a></li>
	<li><a href="?module=menu&action=displayAddMenuEntryForm&menuId=<?php echo $menu->getId(); ?>">Ajouter une entrée au menu</a></li>
	<li><a href="?module=menu">Retour aux menus</a></li>
</ul>

<h2><?php echo stripslashes($menu->getTitle()); ?></h2>

<div class="main_content">
	<p><?php echo stripslashes($menu->getComment()); ?><br /></p>
	
	<?php
		if(sizeof($menuEntries) > 0)
		{
	?>
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Entrée</th>
				<th colspan="3">Actions</th>
			</tr>
		</thead>
		<tbody>
		<?php 
			foreach($menuEntries as $menuEntry)
			{
		?>
			<tr>
				<td><?php echo stripslashes($menuEntry->getEntry()); ?></td>
				<td><a href="?module=menu&action=displayMenuEntry&menuEntryId=<?php echo $menuEntry->getId(); ?>">Voir</a></td>
				<td><a href="?module=menu&action=displayEditMenuEntryForm&menuEntryId=<?php echo $menuEntry->getId(); ?>">Editer</a></td>
				<td><a href="?module=menu&action=displayDeleteMenuEntryForm&menuEntryId=<?php echo $menuEntry->getId(); ?>">Supprimer</a></td>
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

	<p><em><br />Aucune entrée dans ce menu.</em></p>

	<?php
		}
	?>
</div>
