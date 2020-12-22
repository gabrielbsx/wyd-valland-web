<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <span class="title pb-2" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                        Cadastro
                    </span>
                    <ul class="topic_list topic_list-news">
                        <form method="POST" action="<?= base_url('auth/register') ?>" class="mt-6">
                            <div style="width: 90%;margin:0 auto;margin-top:2.5vh;">
                                <?= view('template/message') ?>
                                <label for="username" class="block text-xs font-semibold text-gray-400 uppercase">Usuário</label>
                                <input id="username" pattern="[0-9A-Za-z]{4,12}" title="Apenas de 4 a 12 caracteres alfa numéricos" type="text" name="username" placeholder="kentaro" autocomplete="given-name" required />
                                <label for="email" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">E-mail</label>
                                <input id="email" type="email" name="email" placeholder="kentaro@gmail.com" autocomplete="email" required />
                                <label for="password" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Senha</label>
                                <input id="password" type="password" name="password" placeholder="********" autocomplete="new-password" required />
                                <label for="password-confirm" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Confirmar senha</label>
                                <input id="password-confirm" type="password" name="password_confirm" placeholder="********" autocomplete="new-password" required />
                                <?php if (isset($recaptcha)) : ?>
                                    <div class="flex justify-center mt-5 flex-wrap">
                                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                    </div>
                                <?php endif; ?>
                                <div class="flex justify-center mt-5">
                                    <button type="submit">
                                        Efetuar cadastro
                                    </button>
                                </div>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>