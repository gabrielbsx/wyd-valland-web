<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Novo ticket</span>
    </div>
    <div class="bg-black">
        <div class="px-24 py-12 place-items-center">
            <form method="POST" action="<?= base_url('auth/createticket') ?>" class="mt-6">
                <?= view('template/message') ?>
                <label for="title" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Título</label>
                <input id="title" type="text" name="title" placeholder="Título" class="mb-4" required />
                <textarea name="content" class="editor">
                </textarea>
                <?php if (isset($recaptcha)) : ?>
                    <div class="flex justify-center mt-5 flex-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
                <div class="py-4 flex justify-center">
                    <button type="submit" class="mt-4">
                        Criar ticket
                    </button>
                </div>
                <a href="<?= base_url('dashboard/tickets') ?>" class="block text-center hover:text-white w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-red-900 shadow-lg focus:outline-none hover:bg-red-800 hover:shadow-none">
                    Voltar
                </a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>