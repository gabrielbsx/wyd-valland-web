<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Doações</span>
    </div>
    <div class="bg-black py-6 px-12 rounded-b-lg">
        <div class="grid text-center">
            <span class="title col text-center text-white py-4 bg-gray-800 rounded-lg">
                Doações efetuadas
            </span>
        </div>
        <div class="text-white grid grid-cols-4 bg-gray-900 py-4 mb-3 px-3 rounded-b-lg -my-2">
            <?php if ($donate_paginate) : ?>
                <?php foreach ($donate_paginate as $key => $value) : ?>
                    <?php if ($value['createdAt'] == null): ?>
                        <div class="text-center col-span-4">
                            Não há faturas  
                        </div>
                    <?php $auth = true; continue; endif; ?>
                    <div class="col-span-4 grid grid-cols-8 my-1 px-1 py-4 px-6 bg-gray-800 border-b-4 border-gray-900 text-gray-300 rounded-lg bg-black">
                        <div class="col-span-4 px-1 py-2">
                            <span class="text-left">
                                <span class="text-left">
                                    R$ <?= $value['value'] ?>
                                </span>
                            </span>
                        </div>
                        <div class="col-span-2 px-1 py-2">
                            <span class="text-left">
                                <?= $value['createdAt'] ?? $value['updatedAt'] ?>
                            </span>
                        </div>
                        <div class="col-span-2 py-2 text-right">
                            <?php if (!($value['status'])) : ?>
                                <a target="_blank" href="<?= $value['paymentUrl'] ?>" class="col-span-1 px-12 mr-2 py-2 rounded-lg border-b-4 bg-green-700 hover:bg-green-600 hover:border-green-800 border-green-900">
                                    Pagar
                                </a>
                            <?php endif; ?>
                            <span class="col-span-1 px-12 py-2 rounded-lg border-b-4 <?= $value['status'] ? 'bg-green-700 hover:bg-green-600 hover:border-green-800 border-green-900' : 'bg-yellow-700 hover:bg-yellow-600 hover:border-yellow-800 border-yellow-900' ?>">
                                <?= $value['status'] ? 'Pago' : 'Pendente' ?>
                            </span>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if ($donate_pager && !isset($auth)) : ?>
                    <?= $donate_pager->links('donate', 'pagination') ?>
                <?php endif; ?>
            <?php else : ?>
                <div class="col-span-4 px-1 text-center">
                    <p class="py-4 px-6 bg-gray-900 border-b-4 border-gray-800 text-gray-300 rounded bg-black">
                        Não há doação efetuada
                    </p>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-span-4 grid grid-cols-8 my-2 px-1 py-4 px-6 bg-gray-800 border-b-4 border-gray-900 text-gray-300 rounded-lg bg-black">
            <div class="col-span-8 px-1 py-2 justify-center flex place-items-center">
                <?php if ($package_paginate) : ?>
                    <div class="grid grid-cols-4 justify-center items-center">
                        <?php foreach ($package_paginate as $key => $value) : ?>
                            <div class="grid-span-2 mx-auto w-full p-4">
                                <div class="text-center bg-black py-6 shadow">
                                    <p class="uppercase text-gray-300 font-bold"><?= $value['name'] ?></p>
                                </div>
                                <div class="justify-center p-4 bg-gray-900 border border-r-4 border-l-4 border-gray-800">
                                    <div class="text-center flex justify-center">
                                        <img src="https://s3.amazonaws.com/preview.thegamecrafter.com/7C2E1DC8-245A-11EA-AA99-974C4E5FF538.png" class="w-3/5" />
                                    </div>
                                    <p class="text-center bg-black py-2 font-bold text-1xl rounded-lg">
                                        <?= $value['value'] ?> + <?= $value['bonus'] ?>% = <?= ceil($value['value'] + ($value['value'] * ($value['bonus'] / 100))) ?> donate
                                    </p>
                                    <?php if ($value['donate_bonus']) : ?>
                                        <div class="text-center mt-2 bg-black font-bold text-1xl rounded-lg">
                                            <div class="w-full border-b-2 bg-gray-800 rounded-t-lg border-gray-700 py-1 text-center">
                                                Bonificações
                                            </div>
                                            <?php foreach ($value['donate_bonus'] as $key2 => $value2) : ?>
                                                <div class="py-3">
                                                    <?= $value2['itemname'] ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="flex justify-center grid text-center mt-4 items-center text-gray-900">
                                        <p class="font-bold text-xl mb-4 bg-black rounded-lg py-2">R$<?= $value['value'] ?></p>
                                        <a href="<?= base_url('auth/purchasemp/' . $value['id']) ?>" class="px-6 py-2 text-center bg-green-900 text-gray-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                            Mercadopago
                                        </a>
                                        <a href="<?= base_url('auth/purchasepic/' . $value['id']) ?>" class="px-6 py-2 text-center bg-green-900 text-gray-200 uppercase rounded-full hover:bg-gray-800 hover:text-white border-2 border-gray-900 focus:outline-none">
                                            Picpay
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                <?php else : ?>
                    Não há pacotes de doação cadastrada!
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>