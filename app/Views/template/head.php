<head>
	<meta charset="UTF-8">
	<meta name="description" content="The small framework with powerful features">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/png" href="/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-icons/3.0.1/iconfont/material-icons.min.css" integrity="sha256-x8PYmLKD83R9T/sYmJn1j3is/chhJdySyhet/JuHnfY=" crossorigin="anonymous" />
	<link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('css/app.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
	<script src="https://cdn.tiny.cloud/1/1lhp4scr4dp6utok2d8hee393e6d3rs9yabki2p9jrqxwij5/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

	<link href="<?= base_url('css/bootstrap6654.css') ?>" rel="stylesheet">
	<link href="<?= base_url('css/slick6654.css') ?>" rel="stylesheet">
	<link href="<?= base_url('css/style2455.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.2.0/ekko-lightbox.min.css">

	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&amp;display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Philosopher:wght@400;700&amp;display=swap" rel="stylesheet">

	<link href="<?= base_url('css/maine5bf.css') ?>" rel="stylesheet">

	<meta name="description" content="With Your Destiny Valland - WYD Valland">
	<meta name="keywords" content="with, your, destiny, with your destiny, wyd, wyd brazil, wyd brasil, wydbr, wyd online, wyd private, wyd server, servidor wyd, dark, wyd dark, wyd overdestiny, over, destiny, overdestiny, tlk, the last kingdom, valland, wyd valland, wyd br, wyd 2, wyd2">
	<?php if (isset($recaptcha)): ?>
        <script src="https://www.google.com/recaptcha/api.js"></script>
        <!--<script>
            grecaptcha.ready(function() {
                grecaptcha.execute('<?=$recaptcha?>', {
                    action: '/'
                }).then(function(token) {
                    /*var recaptchaResponse = document.getElementById('recaptchaResponse');
                    recaptchaResponse.value = token;*/
                    document
                        .querySelectorAll("#recaptchaResponse")
                        .forEach(elem => (elem.value = token));
                });
            });
        </script>-->
    <?php endif;?>
	<link href="<?= base_url('inc/forum_functions/style3.css') ?>" rel="stylesheet">
	<title>WYD VALLAND</title>
</head>