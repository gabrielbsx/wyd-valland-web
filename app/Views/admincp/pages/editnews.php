<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <?php if (isset($news)) : ?>
        <form action="<?= base_url('auth/editnews') ?>" method="POST">
            <div class="grid text-gray-300 text-center bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4">
                <span class="z-0 text-2xl bg-transparent text-center">Editor de notícias</span>
            </div>
            <div class="bg-black rounded-b-lg">
                <div class="px-24 py-12 text-white place-items-center">
                    <label for="title" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Título</label>
                    <input id="title" type="text" name="title" value="<?= $news['title'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    <textarea class="editor" name="content">
                        <?= $news['content'] ?>
                    </textarea>
                    <label for="category" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Categorias</label>
                    <select class="block form-select rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 focus:outline-none focus:bg-gray-900 focus:shadow-inner" name="category">
                        <option value="1" <?= $news['category'] == 1 ? 'selected' : '' ?>>Notícia</option>
                        <option value="2" <?= $news['category'] == 2 ? 'selected' : '' ?>>Manutenção</option>
                        <option value="3" <?= $news['category'] == 3 ? 'selected' : '' ?>>Evento</option>
                        <option value="4" <?= $news['category'] == 4 ? 'selected' : '' ?>>Atualização</option>
                    </select>
                    <input type="hidden" name="id" value="<?= $news['id'] ?>">
                    <?php if (isset($recaptcha)) : ?>
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    <?php endif; ?>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded border-b-4 border-gray-700 shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Editar
                    </button>
                    <a href="<?= base_url('admin/news') ?>" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-900 rounded border-b-4 border-gray-800 shadow-lg focus:outline-none hover:bg-gray-800 hover:border-gray-700 hover:shadow-none">
                        Voltar
                    </a>
                </div>
            </div>
        </form>
    <?php else : ?>
        <div class="grid text-center">
            <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Notícias</span>
        </div>
        <div class="bg-black rounded-b-lg">
            <div class="px-48 py-12 text-center text-white place-items-center">
                Notícia inexistente
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>