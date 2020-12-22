<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Recuperar numérica</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="text-white text-center place-items-center px-72">
            <form method="POST" action="<?= base_url('auth/numericpass') ?>" class="mt-6">
                <?php if (isset($recaptcha)) : ?>
                    <div class="flex justify-center mt-5 flex-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
                <button type="submit">
                    Recuperar numérica
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>