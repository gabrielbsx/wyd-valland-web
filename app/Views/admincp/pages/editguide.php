<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <?php if (isset($guide)) : ?>
        <form action="<?= base_url('auth/editguide') ?>" method="POST">
            <div class="grid text-gray-300 text-center bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4">
                <span class="z-0 text-2xl bg-transparent text-center">Editor de guia</span>
            </div>
            <div class="bg-black rounded-b-lg">
                <div class="px-24 py-12 text-white place-items-center">
                    <label for="name" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Nome</label>
                    <input id="name" type="text" name="name" value="<?= $guide['name'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    <input type="hidden" name="id" value="<?= $guide['id'] ?>">
                    <?php if (isset($recaptcha)) : ?>
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    <?php endif; ?>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded border-b-4 border-gray-700 shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Editar
                    </button>
                    <a href="<?= base_url('admin/guides') ?>" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-900 rounded border-b-4 border-gray-800 shadow-lg focus:outline-none hover:bg-gray-800 hover:border-gray-700 hover:shadow-none">
                        Voltar
                    </a>
                </div>
                <div class="text-white grid grid-cols-4 bg-gray-900 py-4 mb-3 px-3 rounded-b-lg -my-2">
                    <?php if ($paginate_articles) : ?>
                        <?php foreach ($paginate_articles as $key => $value) : ?>
                            <div class="col-span-4 grid grid-cols-8 my-1 px-1 py-4 px-6 bg-gray-800 border-b-4 border-gray-900 text-gray-300 rounded-lg bg-black">
                                <div class="col-span-3 px-1 py-2">
                                    <span class="text-left">
                                        <span class="text-left">
                                            <?= $value['title'] ?>
                                        </span>
                                    </span>
                                </div>
                                <div class="col-span-3 py-2 text-right">
                                    <a href="<?= base_url('admin/editarticleguide/' . $value['id']) ?>" class="col-span-1 px-12 mr-2 py-2 rounded-lg border-b-4 bg-green-700 hover:bg-green-600 hover:border-green-800 border-green-900">
                                        Alterar artigo
                                    </a>
                                    <a href="<?= base_url('auth/delarticleguide/' . $value['id']) ?>" class="col-span-1 px-12 py-2 rounded-lg border-b-4 bg-red-700 hover:bg-red-600 hover:border-red-800 border-red-900">
                                        Deletar artigo
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <?php if ($pager_articles) : ?>
                            <?= $pager_articles->links('articles', 'pagination') ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <div class="text-center col-span-8">
                            Não há artigos nesse guia!
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    <?php else : ?>
        <div class="grid text-center">
            <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Editor de guias</span>
        </div>
        <div class="bg-black rounded-b-lg">
            <div class="px-48 py-12 text-center text-white place-items-center">
                Guia inexistente
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>