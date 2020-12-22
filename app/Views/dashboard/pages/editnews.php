<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <?php if (isset($news)) : ?>
        <form action="<?= base_url('auth/editnews') ?>" method="POST">
            <div class="grid text-gray-300 text-center bg-black py-4" style="border-bottom: 1px solid rgba(255, 55, 55, 0.5);">
                <span class="z-0 text-2xl bg-transparent text-center">Editor de notícias</span>
            </div>
            <div class="bg-black">
                <div class="px-24 py-12 text-white place-items-center">
                    <?= view('template/message') ?>
                    <label for="title" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Título</label>
                    <input id="title" type="text" name="title" class="mb-4" value="<?= $news['title'] ?>" required />
                    <textarea class="editor" name="content">
                        <?= $news['content'] ?>
                    </textarea>
                    <label for="category" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Categorias</label>
                    <select name="category">
                        <option value="1" <?= $news['category'] == 1 ? 'selected' : '' ?>>Notícia</option>
                        <option value="2" <?= $news['category'] == 2 ? 'selected' : '' ?>>Manutenção</option>
                        <option value="3" <?= $news['category'] == 3 ? 'selected' : '' ?>>Evento</option>
                        <option value="4" <?= $news['category'] == 4 ? 'selected' : '' ?>>Atualização</option>
                    </select>
                    <input type="hidden" name="id" value="<?= $news['id'] ?>">
                    <?php if (isset($recaptcha)) : ?>
                        <div class="flex justify-center mt-5 flex-wrap">
                            <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                        </div>
                    <?php endif; ?>
                    <div class="flex justify-center items-center w-full">
                        <button class="" type="submit">
                            Editar
                        </button>
                    </div>
                    <a href="<?= base_url('dashboard/news') ?>" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-900 shadow-lg focus:outline-none hover:text-gray-100 hover:bg-red-800 hover:shadow-none">
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