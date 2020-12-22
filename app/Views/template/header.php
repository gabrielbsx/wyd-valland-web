<div class="bg-gradient-to-b py-4 from-black">
    <div class="container flex-s-c">
        <div class="topLine_text">
            Jogue agora mesmo WYD VALLAND
        </div>
        <div class="topLine_links flex-c">
            <div class="flex">
                <?php if (session()->has('login')) : ?>
                    <div x-data="{ show: false }" @click.away="show = false">
                        <button @click="show = ! show" class="lg:inline-flex lg:w-auto w-full px-6 py-3 rounded text-white items-center justify-center hover:bg-gray-900 hover:text-gray-100" style="z-index:999;">
                            <span><i class="fas fa-user"></i> <?= ucfirst(session()->get('login')['username']) ?></span>
                            <i class="ml-2 fas fa-angle-down"></i>
                        </button>
                        <div x-show="show" class="absolute text-white rounded-b-lg py-2 flex bg-black shadow-md" style="min-width:10rem;z-index:999;">
                            <?php if (session()->get('login')['access'] == 3) : ?>
                                <a class="w-full py-3" href="<?= base_url('dashboard/news') ?>">Notícias</a>
                                <a class="w-full py-3" href="<?= base_url('dashboard/config') ?>">Configurações</a>
                            <?php endif; ?>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/tickets') ?>">Suporte</a>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/alterpass') ?>">Alterar senha</a>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/numericpass') ?>">Recuperar numérica</a>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/guildmark') ?>">Guildmark</a>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/donate') ?>">Doações</a>
                            <a class="block w-full py-3" href="<?= base_url('dashboard/logout') ?>">Sair</a>
                        </div>
                    </div>
                <?php else : ?>
                    <a href="<?= base_url('site/login') ?>">
                        <button>
                            Login
                        </button>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<header>
    <div class="topPanel">
        <div class="topPanel-container flex-s-c">
            <div class="topPanel_left flex-c">
                <div class="logo-mini">
                    <a href="#" class="bright">
                        <img src="<?= base_url('images/logo-small.png') ?>" alt="Logo">
                    </a>
                </div>
                <div class="menuBlock">
                    <ul class="menu">
                        <li>
                            <a href="<?= base_url('/') ?>">Home</a>
                        </li>
                        <li>
                            <a href="<?= base_url('site/ranking') ?>">Ranking</a>
                        </li>
                        <li>
                            <a href="<?= base_url('site/downloads') ?>">Download</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<header>
    <div class="container justify-center">
        <div class="ray"></div>
        <div class="rainbow"></div>
        <div class="sparks">
            <div class="spark_1"></div>
            <div class="spark_2"></div>
            <div class="spark_3"></div>
            <div class="spark_4 spark-big"></div>
            <div class="spark_5 spark-big"></div>
        </div>
        <div class="logo grid justify-center">
            <a href="#" class="bright">
                <img src="<?= base_url('/images/logo.png') ?>" alt="Logo">
            </a>
        </div>
        <div class="headerTitle">
            <span class="h1"> </span>
        </div>
        <div class="headerBlock flex-s-c">
            <div class="text-white px-4 py-2">
            </div>
            <div class="headerBlock_buttons flex-c">
                <?php if (!session()->has('login')) : ?>
                    <a href="<?= base_url('site/downloads') ?>" class="game-button head-button bright">
                        <span>Download</span>
                    </a>
                    <a href="<?= base_url('site/register') ?>" class="about-button head-button bright">
                        <span>Registrar</span>
                    </a>
                <?php else : ?>
                    <a href="<?= base_url('dashboard') ?>" class="game-button head-button bright">
                        <span>Painel do usuário</span>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</header>