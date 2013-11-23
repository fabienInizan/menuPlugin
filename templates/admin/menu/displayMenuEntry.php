<ul class="context_menu">
	<li><a href="?module=menu&action=displayEditMenuEntryForm&menuEntryId=<?php echo $menuEntry->getId(); ?>">Modifier</a></li>
	<li><a href="?module=menu&action=displayDeleteMenuEntryForm&menuEntryId=<?php echo $menuEntry->getId(); ?>">Supprimer</a></li>
	<li><a href="?module=menu&action=display&menuId=<?php echo $menuEntry->getMenuId(); ?>">Retour au menu</a></li>
</ul>

<h2><?php echo stripslashes($menuEntry->getEntry()); ?></h2>

<div class="main_content">

	<p><?php echo stripslashes($menuEntry->getComment()); ?><br /></p>
	
	<table cellpadding="0" cellspacing="0">
		<thead>
			<tr>
				<th>Champ</th>
				<th>Valeur</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>Index</td>
				<td><?php echo stripslashes($menuEntry->getIndex()); ?></td>
			</tr>
			<tr>
				<td>Entrée</td>
				<td><?php echo stripslashes($menuEntry->getEntry()); ?></td>
			</tr>
			<tr>
				<td>Lien</td>
				<td><?php echo stripslashes($menuEntry->getLink()); ?></td>
			</tr>
		</tbody>
	</table>
</div>
