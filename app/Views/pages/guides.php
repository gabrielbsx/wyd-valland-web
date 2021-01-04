<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Guia do Jogo</span>
    </div>
    <div class="bg-black rounded-b-lg">
        <div class="px-24 py-4 place-items-center">
            <div class="mx-auto px-4 sm:px-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                        <?php foreach ($guides as $key => $value) : ?>
                            <div class="text-white grid-cols-2 my-4">
                                <div class="col-span-2 py-4 bg-gray-800 px-1 text-center">
                                    <?= $value['name'] ?>
                                </div>
                                <div class="col-span-2 grid bg-gray-900 grid grid-cols-4 py-4 px-1 text-center">
                                    <?php if (count($value['articles']) > 0) : ?>
                                        <?php foreach ($value['articles'] as $key2 => $value2) : ?>
                                            <div class="col-span-1 py-4 px-6 text-center">
                                                <a class="w-full flex justify-center px-6 py-4 rounded-lg text-gray-100 border border-gray-700 hover:border-gray-800 hover:text-gray-300" href="#"><?= $value2['title'] ?></a>
                                            </div>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <div class="col-span-4 px-1 text-center">
                                            Não há artigos nesse guia
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>