<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto bg-black col-span-6 py-4 px-4 shadow-lg">
    <?php if (isset($ticket)) : ?>
        <div class="my-4 py-8">
            <div class="grid text-gray-300 text-center py-4" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);background-color: rgba(155, 155, 255, 0.07);">
                <span class="z-0 text-2xl">
                    <?= $ticket['title'] ?>
                </span>
                <div class="text-white text-xs place-items-center">
                    <?= $ticket['username'] ?>
                </div>
            </div>
            <div class="">
                <div class="px-24 py-12 bg-gray-900 text-white place-items-center">
                    <?= $ticket['content'] ?>
                </div>
            </div>
        </div>
        <?php if ($answers_paginate) : ?>
            <?php foreach ($answers_paginate as $key => $value) : ?>
                <div class="my-4" style="background-color: rgba(155, 155, 255, 0.07);">
                    <div class="grid text-gray-300 text-center py-4" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                        <span class="z-0 text-2xl">
                            Resposta
                        </span>
                        <div class="text-white text-xs place-items-center">
                            <?= $value['access'] == 3 ? 'Administração' : $value['username'] ?>
                        </div>
                    </div>
                    <div class="">
                        <div class="px-24 py-12 bg-gray-900 text-white place-items-center">
                            <?= $value['content'] ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
            <?php if (isset($answers_pager)) : ?>
                <?= $answers_pager->links('answers', 'pagination') ?>
            <?php endif; ?>
        <?php else : ?>
            <div class="my-4 py-8">
                <div class="text-center">
                    <div class="px-24 text-white place-items-center">
                        Não há resposta(s)
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="my-4 pb-8">
            <div class="text-center" style="background-color: rgba(155, 155, 255, 0.07);">
                <div class="<?= $ticket['status'] == 0 ? 'px-24 py-12 text-white place-items-center' : '' ?>">
                    <?php if ($ticket['status'] == 0) : ?>
                        <div class="grid text-gray-300 text-center py-4" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                            <span class="z-0 text-2xl">
                                Responder ticket
                            </span>
                        </div>
                        <form action="<?= base_url('auth/answerticket') ?>" method="POST">
                            <textarea name="content" class="editor"></textarea>
                            <input type="hidden" name="id_ticket" value="<?= $ticket['id'] ?>">
                            <?php if (isset($recaptcha)) : ?>
                                <div class="flex justify-center mt-5 flex-wrap">
                                    <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                </div>
                            <?php endif; ?>
                            <div class="flex justify-center my-6">
                                <button type="submit">
                                    Responder ticket
                                </button>
                            </div>
                        </form>
                        <form class="mb-8" action="<?= base_url('auth/closeticket') ?>" method="POST">
                            <input type="hidden" name="id_ticket" value="<?= $ticket['id'] ?>">
                            <button type="submit">
                                Encerrar ticket
                            </button>
                        </form>
                    <?php endif; ?>
                    <a href="<?= base_url('dashboard/tickets') ?>" class="block text-center w-full hover:text-white py-3 font-medium tracking-widest text-white uppercase bg-red-900 hover:text-white shadow-lg focus:outline-none hover:bg-red-800 hover:shadow-none">
                        Voltar
                    </a>
                </div>
            </div>
        </div>
    <?php else : ?>
        <div class="grid text-center">
            <span class="text-gray-300 z-0 py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Ticket</span>
        </div>
        <div class="bg-black rounded-b-lg">
            <div class="py-12 text-center text-white place-items-center">
                Ticket inexistente
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>