<?php

/**
 * @var \CodeIgniter\Pager\PagerRenderer $pager
 */

$pager->setSurroundCount(2);

?>
<div class="flex" aria-label="<?= lang('Pager.pageNavigation') ?>">
    <div class="mx-auto flex">
        <?php if ($pager->hasPrevious()) : ?>
            <div>
                <a href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>" class="flex items-center font-bold mx-1 px-3 py-2 bg-gray-800 hover:bg-gray-700 text-gray-100">
                    <span>«</span>
                </a>
            </div>
        <?php endif ?>
        <?php foreach ($pager->links() as $link) : ?>
            <div>
                <a href="<?= $link['uri'] ?>" class="flex items-center font-bold mx-1 px-3 py-2 text-gray-100 <?= $link['active'] ? 'bg-gray-500 hover:bg-gray-600' : 'bg-gray-700 hover:bg-gray-600' ?>">
                    <?= $link['title'] ?>
                </a>
            </div>
        <?php endforeach ?>
        <?php if ($pager->hasNext()) : ?>
            <div>
                <a href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>" class="flex items-center font-bold mx-1 px-3 py-2 bg-gray-800 hover:bg-gray-700 text-gray-100">
                    <span aria-hidden="true">»</span>
                </a>
            </div>
        <?php endif ?>
    </div>
</div>