<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Sistema de doação</span>
    </div>
    <div class="bg-black py-6 px-12 rounded-b-lg">
        <div class="grid text-center mb-6">
            <a href="<?= base_url('admin/packagedonate') ?>" class="py-4 px-6 w-full text-gray-300 bg-gray-800 hover:bg-gray-700 rounded">Adicionar novo pacote</a>
        </div>
        <div class="text-white grid grid-cols-4">
            <?php if ($paginate_package) : ?>
                <?php foreach ($paginate_package as $key => $value) : ?>
                    <div class="col-span-4 grid grid-cols-8 my-2 px-1 py-4 px-6 bg-gray-800 border-b-4 border-gray-900 text-gray-300 rounded-lg bg-black">
                        <div class="col-span-3 px-1 py-2">
                            <span class="text-left"><?= $value['name'] ?></span>
                        </div>
                        <div class="col-span-1 px-1 py-2">
                            <span class="text-left">
                                <?= $value['updated_at'] ?? $value['created_at'] ?>
                            </span>
                        </div>
                        <div class="col-span-4 text-right">
                            <div class="grid grid-cols-3 text-center">
                                <a href="<?= base_url('admin/additem/' . $value['id']) ?>" class="bg-green-700 hover:bg-green-600 hover:border-green-800 col-span-1 px-12 mr-2 py-2 rounded-lg border-b-4 border-green-900">
                                    Adicionar Item
                                </a>
                                <a href="<?= base_url('admin/editpackage/' . $value['id']) ?>" class="bg-blue-700 hover:bg-blue-600 hover:border-blue-800 col-span-1 px-12 mr-2 py-2 rounded-lg border-b-4 border-blue-900">
                                    Editar
                                </a>
                                <a href="<?= base_url('auth/delpackage/' . $value['id']) ?>" class="bg-red-700 hover:bg-red-600 hover:border-red-800 col-span-1 px-12 py-2 rounded-lg border-b-4 border-red-900">
                                    Deletar
                                </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($pager_package) : ?>
                    <?= $pager_package->links('package', 'pagination') ?>
                <?php endif; ?>
            <?php else : ?>
                <div class="col-span-4 px-1 text-center">
                    <p class="py-4 px-6 bg-gray-900 border-b-4 border-gray-800 text-gray-300 rounded bg-black">
                        Não há pacotes!
                    </p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?= $this->endSection() ?>