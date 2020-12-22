<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Doação</span>
    </div>
    <div class="bg-black p-8">
        <div class="text-white text-center place-items-center">
            <div x-data="{ tab: 'terms' }">
                <div class="mb-6">
                    <div class="py-8 w-full">
                        <p class="py-4" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">WYD VALLAND - Doações</pstyle=>
                        <p class="text-justify py-2 px-4">
                            informações...
                        </p>
                    </div>
                </div>
                <div>
                    <button @click="tab = 'agree'">Concordo com os termos</button>
                    <button @click="tab = 'disagree'">Não concordo com os termos</button>
                </div>
                <div class="mt-6">
                    <div x-show="tab === 'agree'">
                        <a href="<?= base_url('dashboard/mercadopago') ?>">
                            <button>
                                Mercado Pago
                            </button>
                        </a>
                        <a href="<?= base_url('dashboard/picpay') ?>">
                            <button>
                                Picpay
                            </button>
                        </a>
                    </div>
                    <div class="py-4 rounded-lg" x-show="tab === 'disagree'">
                        <p>Olá, <?= session()->get('login')['username'] ?>. Mesmo discordando dos termos acima, você ainda pode e deve jogar o WYD VALLAND.</p>
                        <p>Caso achar que nosso projeto vale a pena a contribuição, doe e receba bônus e brindes...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>