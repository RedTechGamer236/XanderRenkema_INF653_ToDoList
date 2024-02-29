<?php include('view/header.php') ?>

<section id="list" class="list">
	<h1>ToDo List</h1>
	<?php if (!empty($tasks)) : ?>
		<?php foreach ($tasks as $task) : ?>
			<div>
				<p><strong><?= htmlspecialchars($task['Title'])?></strong></p>
				<p><?= htmlspecialchars($task['Description'])?></p>
				<form action="." method="post">
					<input type="hidden" name="action" value="delete_task">
					<input type="hidden" name="task_id" value="<?= $task['ItemNum'] ?>">
					<button type="submit">X</button>
				</form>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<p>No to do items exist yet.</p>
	<?php endif; ?>
</section>

<section id="add" class="add">
	<h2>Add Item</h2>
	<form action="." method="post" id="add__form" class="add_form">
		<input type="text" name="title" maxlength="20" placeholder="Title" required>
		<input type="text" name="description" maxlength="50" placeholder="Description" required>
		<button type="submit" name="action" value="add_task">Add Item</button>
	</form>
</section>

<?php include('view/footer.php');?>