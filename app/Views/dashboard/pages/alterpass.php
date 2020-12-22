<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-100 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Alteração de senha</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="text-white text-center place-items-center">
            <form method="POST" action="<?= base_url('auth/alterpass') ?>" class="mt-6">
                <label for="oldpassword" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Senha atual</label>
                <input id="oldpassword" type="password" name="oldpassword" placeholder="********" autocomplete="new-password" required />
                <label for="password" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Nova senha</label>
                <input id="password" type="password" name="password" placeholder="********" autocomplete="new-password" required />
                <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Confirmar nova senha</label>
                <input id="password-confirm" type="password" name="password_confirm" placeholder="********" autocomplete="new-password" required />
                <?php if (isset($recaptcha)) : ?>
                    <div class="flex justify-center mt-5 flex-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
                <button type="submit" class="mt-4">
                    Alterar senha
                </button>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>