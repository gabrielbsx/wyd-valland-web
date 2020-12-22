<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <span class="title pb-2" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                        Mercado Pago
                    </span>
                    <ul class="topic_list topic_list-news">
                        <div style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                            <?= view('template/message') ?>
                        </div>
                        <div class="" style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                            <div class="justify-center text-center flex">
                                <span class="title col opacity-50 text-center py-4 bg-red-900">
                                    Cobranças
                                </span>
                            </div>
                            <?php if (isset($mp_paginate)) : ?>
                                <?php foreach ($mp_paginate as $key => $value) : ?>
                                    <div class="col-span-4 grid grid-cols-10 my-2 mx-4 ">
                                        <div class="col-span-5 px-1">
                                            <span class="text-left">
                                                <a href="<?= $value['url_payment'] ?>">
                                                    <button>
                                                        Efetuar pagamento
                                                    </button>
                                                </a>
                                            </span>
                                        </div>
                                        <div class="col-span-2 text-right py-4 mr-4">
                                            <span class="text-left">
                                                Valor: R$ <?= $value['value'] ?>
                                            </span>
                                        </div>
                                        <div class="col-span-3 text-right">
                                            <div class="grid grid-cols-3 text-center">
                                                <div class="py-4 px-3 mx-1 text-white col-span-2">
                                                    <?= $value['created_at'] ?>
                                                </div>
                                                <div class="py-4 px-3 mx-1 text-white col-span-1 bg-<?= $value['status'] ? 'green' : 'yellow' ?>-900">
                                                    <?= $value['status'] ? 'Pago' : 'Pendente' ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                <?php if ($mp_pager) : ?>
                                    <div class="my-4 justify-center">
                                        <?= $mp_pager->links('news', 'pagination') ?>
                                    </div>
                                <?php endif; ?>
                            <?php else : ?>
                                <div class="col-span-4 grid grid-cols-10 my-2 mx-4 ">
                                    <div class="justify-center text-center col-span-10 text-white">
                                        Não há pincodes
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                        <form style="background-color: rgba(155, 55, 55, 0.1);" class="py-4" method="POST" action="<?= base_url('auth/mercadopago') ?>">
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