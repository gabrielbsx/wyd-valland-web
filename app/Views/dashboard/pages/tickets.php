<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Suporte</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="grid text-center mb-6">
            <a href="<?= base_url('dashboard/createticket') ?>" class="py-4 px-6 w-full text-gray-300 bg-red-800 hover:bg-red-700 hover:text-white">Adicionar novo ticket</a>
        </div>
        <div class="text-white grid grid-cols-4">
            <?php if ($paginate_tickets) : ?>
                <?php foreach ($paginate_tickets as $key => $value) : ?>
                    <div class="col-span-4 grid grid-cols-9 my-2">
                        <div class="col-span-5 px-1 py-4">
                            <span class="text-left"><?= $value['title'] ?></span>
                        </div>
                        <div class="col-span-2 text-right py-4 mr-4">
                            <span class="text-left">
                                <?= $value['updated_at'] ?? $value['created_at'] ?>
                            </span>
                        </div>
                        <div class="col-span-2 text-right">
                            <div class="grid grid-cols-2 text-center">
                                <a href="<?= base_url('dashboard/answerticket/' . $value['id']) ?>">
                                    <button>
                                        Abrir
                                    </button>
                                </a>
                                <?php if ($value['status'] == 0) : ?>
                                    <span class="py-4 justify-center col-span-1" style="color: rgba(255, 255, 0, 1);">
                                        Pendente
                                    </span>
                                <?php else : ?>
                                    <span class="py-4 justify-center col-span-1" style="color: rgba(255, 85, 85, 1);">
                                        Encerrado
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-span-4 px-1 text-center">
                    <p class="py-4 px-6 bg-gray-900 border-b-4 border-gray-800 text-gray-300 rounded bg-black">
                        Não há ticket!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>