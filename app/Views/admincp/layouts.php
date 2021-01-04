<!DOCTYPE html>
<html lang="en">
<?= view('template/head') ?>

<body class="bg-gray-900">
	<?= view('template/header') ?>
	<?= view('template/navbar') ?>
	<div class="container mx-auto rounded-t-lg bg-gradient-to-b to-gray-800 from-gray-900 border-t-4 border-gray-700">
		<main class="grid grid-cols-6">
			<?= view('template/message') ?>
			<?= $this->renderSection('page') ?>
		</main>
	</div>
	<?= view('template/footer') ?>
</body>

</html>