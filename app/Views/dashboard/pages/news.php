<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(255,55,55,0.4);">Notícias</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="grid text-center mb-6">
            <?= view('template/message') ?>
        </div>
        <div class="grid text-center mb-6">
            <a href="<?= base_url('dashboard/createnews') ?>" class="py-4 px-6 w-full text-gray-300 bg-red-900 hover:bg-red-700 hover:text-gray-100">Adicionar nova notícia</a>
        </div>
        <div class="text-white grid grid-cols-4">
            <?php if ($paginate_news) : ?>
                <?php foreach ($paginate_news as $key => $value) : ?>
                    <div class="col-span-4 grid grid-cols-9 my-2 text-gray-300 bg-black">
                        <div class="col-span-5 px-1 py-2">
                            <span><?= $value['title'] ?></span>
                        </div>
                        <div class="col-span-2 px-1 py-2">
                            <?= $value['updated_at'] ?? $value['created_at'] ?>
                        </div>
                        <div class="col-span-2 text-right">
                            <div class="grid grid-cols-2 text-center">
                                <a href="<?= base_url('dashboard/editnews/' . $value['id']) ?>">
                                    <button>
                                        Editar
                                    </button>
                                </a>
                                <a href="<?= base_url('auth/delnews/' . $value['id']) ?>">
                                    <button>
                                        Deletar
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="col-span-4 px-1 text-center">
                    <p class="py-4 px-6 bg-gray-900 border-b-4 border-gray-800 text-gray-300 bg-black">
                        Não há notícias!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>