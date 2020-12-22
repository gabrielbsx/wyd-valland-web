<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Recuperação de contas</span>
    </div>
    <div class="bg-black rounded-b-lg">
        <div class="px-72 py-12 place-items-center">
            <form method="POST" action="<?= base_url('auth/recovery') ?>" class="mt-6">
                <?= view('template/message') ?>
                <label for="email" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">E-mail</label>
                <input id="email" type="email" name="email" placeholder="kentaro@gmail.com" autocomplete="email" class="block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-700 focus:shadow-inner" required />
                <?php if (isset($recaptcha)) : ?>
                    <div class="flex justify-center mt-5 flex-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
                <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded border-b-4 border-gray-700 shadow-lg focus:outline-none hover:bg-gray-700 hover:shadow-none">
                    Recuperar contas
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>