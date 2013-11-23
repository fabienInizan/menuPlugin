<ul class="context_menu">
	<li><a href="?module=menu">Retour aux menus</a></li>
</ul>

<form action="?module=menu&action=edit" method="post">
	<input type="hidden" name="menuId" value="<?php echo $menu->getId(); ?>" />

	<label class="mandatory">Titre</label>
	<input type="text" name="title" value="<?php echo stripslashes($menu->getTitle()); ?>" />

	<label>Commentaire</label>
	<textarea name="comment"><?php echo stripslashes($menu->getComment()); ?></textarea>

	<button type="submit">Modifier</button>
</form>
