<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-100 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Configuração</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="text-white text-center place-items-center">
            <form method="POST" action="<?= base_url('auth/config') ?>" class="mt-6">
                <div class="mb-6">
                    <?= view('template/message') ?>
                </div>
                <label for="title" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Título do site</label>
                <input id="title" type="text" name="title" placeholder="Título do site" value="<?= $configuration['title'] ?? '' ?>" />

                <label for="recaptchasite" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Recaptcha Site</label>
                <input id="recaptchasite" type="text" name="recaptcha_site" placeholder="Recaptcha Site" value="<?= $configuration['recaptcha_site'] ?? '' ?>" />

                <label for="recaptchasecret" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Recaptcha Secret Key</label>
                <input id="recaptchasecret" type="text" name="recaptcha_secret" placeholder="Recaptcha Secret Key" value="<?= $configuration['recaptcha_secret'] ?? '' ?>" />

                <label for="picpaytoken" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Picpay Token</label>
                <input id="picpaytoken" type="text" name="picpay_token" placeholder="Picpay Token" value="<?= $configuration['picpay_token'] ?? '' ?>" />

                <label for="picpayseller" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Picpay Seller</label>
                <input id="picpayseller" type="text" name="picpay_seller" placeholder="Picpay Seller" value="<?= $configuration['picpay_seller'] ?? '' ?>" />

                <label for="mercadopagokey" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Mercado Pago Public Key</label>
                <input id="mercadopagokey" type="text" name="mercadopago_key" placeholder="Mercado Pago Public Key" value="<?= $configuration['mercadopago_key'] ?? '' ?>" />

                <label for="mercadopagotoken" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Mercado Pago Token</label>
                <input id="mercadopagotoken" type="text" name="mercadopago_token" placeholder="Mercado Pago Token" value="<?= $configuration['mercadopago_token'] ?? '' ?>" />
                <?php if (isset($recaptcha)) : ?>
                    <div class="flex justify-center mt-5 flex-wrap">
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    </div>
                <?php endif; ?>
                <button type="submit" class="mt-4">
                    Configurar
                </button>
                <a href="<?= base_url('dashboard') ?>" class="block text-center w-full hover:text-white py-3 mt-3 font-medium tracking-widest text-white uppercase bg-red-900 hover:text-white shadow-lg focus:outline-none hover:bg-red-800 hover:shadow-none">
                    Voltar
                </a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>