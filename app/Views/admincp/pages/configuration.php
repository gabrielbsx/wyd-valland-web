<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <?php if (isset($configuration)) : ?>
        <form action="<?= base_url('auth/config') ?>" method="POST">
            <div class="grid text-gray-300 text-center bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4">
                <span class="z-0 text-2xl bg-transparent text-center">Configurações</span>
            </div>
            <div class="bg-black rounded-b-lg">
                <div class="px-24 py-12 text-white place-items-center">
                    <?php foreach ($configuration as $key => $value) : ?>
                        <?php if (in_array($key, ['deleted_at', 'created_at', 'updated_at', 'id'])) continue; ?>
                        <label for="<?= $key ?>" class="block mt-2 text-xs font-semibold text-gray-400 uppercase"><?= str_replace('_', ' ', $key) ?></label>
                        <input id="<?= $key ?>" type="text" name="<?= $key ?>" value="<?= $value ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    <?php endforeach; ?>
                    <?php if (isset($recaptcha)) : ?>
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    <?php endif; ?>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded border-b-4 border-gray-700 shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        salvar
                    </button>
                    <a href="<?= base_url('dashboard') ?>" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-900 rounded border-b-4 border-gray-800 shadow-lg focus:outline-none hover:bg-gray-800 hover:border-gray-700 hover:shadow-none">
                        Voltar
                    </a>
                </div>
            </div>
        </form>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>