<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <span class="title pb-2" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">
                        Login
                    </span>
                    <ul class="topic_list topic_list-news">
                        <form method="POST" action="<?= base_url('auth/login') ?>">
                            <div style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                                <?= view('template/message') ?>
                            </div>
                            <div style="width: 90%;margin:0 auto;margin-top:3.5vh;">
                                <input name="username" type="text" placeholder="Usuário">
                            </div>
                            <div style="width: 90%;margin:0 auto;margin-top:2.5vh;">
                                <input name="password" type="password" placeholder="Senha">
                            </div>
                            <?php if (isset($recaptcha)) : ?>
                                <div class="flex justify-center mt-5 flex-wrap">
                                    <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                                </div>
                            <?php endif; ?>
                            <div style="width: 90%;margin:0 auto;margin-top:2.5vh;">
                                <button class="btn-primary text-center" style="display:block;margin:0 auto;">
                                    Entrar
                                </button>
                            </div>
                        </form>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>