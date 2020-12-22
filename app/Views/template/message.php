<?php if (isset(session('web')['error'])) : ?>
    <div class="my-1 message col-span-6 py-4 text-center text-white bg-red-800">
        <?= session('web')['error'] ?>
    </div>
<?php endif; ?>

<?php if (isset(session('web')['success'])) : ?>
    <div class="my-1 message col-span-6 py-4 text-center text-white border-green-600 bg-green-800">
        <?= session('web')['success'] ?>
    </div>
<?php endif; ?>