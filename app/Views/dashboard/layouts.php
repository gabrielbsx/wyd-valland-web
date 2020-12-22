<!DOCTYPE html>
<html lang="en">
<?= view('template/head') ?>

<body class="bg-black">
	<?= view('template/header') ?>
	<div class="informer">
		<?= $this->renderSection('page') ?>
	</div>
	<?= view('template/footer') ?>
</body>

</html>