<div>
    <div class="container">
        <div class="grid bg-black px-8 py-4" style="border-top: 1px solid rgba(155, 55, 55, 8);">
            <div class="toTop">Voltar</div>
            <div class="row footerTop">
                <div class="col-lg-3 col-sm-6">
                    <div class="footerMenu">
                        <span class="title">Informações</span>
                        <ul class="footerMenu_list">
                            <li><a href="#">Staff</a></li>
                            <li><a href="#">Servidor</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footerMenu">
                        <span class="title">Páginas</span>
                        <ul class="footerMenu_list">
                            <li><a href="<?= base_url('site') ?>">Home</a></li>
                            <li><a href="<?= base_url('site/ranking') ?>">Ranking</a></li>
                            <li><a href="<?= base_url('site/downloads') ?>">Downloads</a></li>
                            <li>
                                <a href="<?= base_url('site/faq') ?>">FAQ</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footerMenu">
                        <span class="title">Comunidade</span>
                        <ul class="footerMenu_list">
                            <li><a href="https://fb.com/vallandwyd">Facebook</a></li>
                            <li><a href="https://youtube.com/sirkentaro">YouTube</a></li>
                            <li><a href="Kentaro#6680">Discord</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="footerMenu">
                        <span class="title">Contato</span>
                        <div class="support">
                            <p>Suporte </p>
                            <a href="#" class="__cf_email__" data-cfemail="6b181e1b1b1b04191f2b02051f0e19071e0f0e4604050702050e45191e">suporte@wydvalland.com</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footerBottom flex-s-c">
                <div class="copy">
                    © 2020 WYD VALLAND - Desenvolvido por Kentaro<br>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
<script src="<?= base_url('js/customc1f7.js') ?>"></script>
<script src="<?= base_url('js/slick.min.js') ?>"></script>
<script src="<?= base_url('/js/globald387.js') ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="<?= base_url('js/custom.js') ?>"></script>
<?php $uri = $uri = new \CodeIgniter\HTTP\URI(current_url(true)); ?>
<?php if ($uri->getPath() == '/dashboard/guildmark') : ?>
    <script>
        $(document).ready(function() {
            const guilds = $('.guilds');
            $.ajax({
                url: "<?= base_url('auth/mob') ?>",
                type: "GET",
                success: function(data) {
                    data = JSON.parse(data)
                    if (data.length > 0) {
                        $.each(data, function(key, value) {
                            guilds.append('<option value="' + value.guildid + '">' + value.guildname + '</option>')
                        });
                    } else {
                        const guildmark = $('.guildmarks')
                        const send = $('.send')
                        guildmark.html('<div class="my-4 text-gray-100">Você não é líder de guild portanto não pode enviar guildmark!</div>')
                        send.remove()
                    }
                }
            });
        });
    </script>
<?php endif; ?>
<script>
    tinymce.init({
        selector: '.editor',
        skin: 'oxide-dark',
        content_css: 'dark'
    });
</script>