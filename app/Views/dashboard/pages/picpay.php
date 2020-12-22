<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <span class="title pb-2" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                        Picpay
                    </span>
                    <ul class="topic_list topic_list-news">
                        <div style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                            <?= view('template/message') ?>
                        </div>
                        <div class="" style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                            <div class="justify-center text-center flex">
                                <span class="title col opacity-50 text-center py-4 bg-red-900">
                                    Pincodes
                                </span>
                            </div>
                            <div class="col-span-4 grid grid-cols-10 my-2">
                                <?php if (isset($mercadopago)) : ?>
                                    <?php foreach ($mercadopago as $key => $value) : ?>
                                        <div class="col-span-5 px-1 py-4">
                                            <span class="text-left">
                                                Pincode: <span>12312314</span>
                                            </span>
                                        </div>
                                        <div class="col-span-2 text-right py-4 mr-4">
                                            <span class="text-left">
                                                Valor: R$ 10,00
                                            </span>
                                        </div>
                                        <div class="col-span-3 text-right">
                                            <div class="grid grid-cols-3 text-center">
                                                <div class="py-4 px-3 mx-1 text-white col-span-2">
                                                    12-12-12 - 12:12:12
                                                </div>
                                                <div class="py-4 px-3 mx-1 text-white col-span-1 bg-green-900">
                                                    Pago
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <div class="justify-center text-center col-span-10 text-white">
                                        Não há pincodes
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <form method="POST" action="<?= base_url('auth/mercadopago') ?>">
                            <div style="width: 90%;margin:0 auto;margin-top:2.5vh;">
                                <input name="value" placeholder="Valor R$">
                            </div>
                            <?php if (isset($recaptcha)) : ?>
                                <div class="flex justify-center mt-5 flex-wrap">
                                    <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                </div>
                            <?php endif; ?>
                            <div style="width: 90%;margin:0 auto;margin-top:2.5vh;">
                                <button class="btn-primary text-center" style="display:block;margin:0 auto;">
                                    Gerar fatura
                                </button>
                            </div>
                        </form>
                    </ul>
                    <a href="<?= base_url('dashboard/donate') ?>" class="block text-center w-full hover:text-white py-3 mt-3 font-medium tracking-widest text-white uppercase bg-red-900 hover:text-white shadow-lg focus:outline-none hover:bg-red-800 hover:shadow-none">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>