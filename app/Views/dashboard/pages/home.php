<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <span class="title">
                        Bem-vindo novamente, <?= session()->get('login')['username'] ?>.
                    </span>
                    <ul class="topic_list topic_list-news">
                        <div class="grid px-24 mt-10">
                            <?= view('template/message') ?>
                            <div class="w-full py-4 px-4 my-2 bg-red-900 opacity-50 hover:bg-red-800 text-white">
                                <span>
                                    Data de criação da conta:
                                </span>
                                <span class="ml-1">
                                    <?= session()->get('login')['created_at'] ?>
                                </span>
                            </div>
                            <div class="w-full py-4 px-4 my-2 bg-red-900 opacity-50 hover:bg-red-800 text-white">
                                <span>
                                    Usuário:
                                </span>
                                <span class="ml-1">
                                    <?= session()->get('login')['username'] ?>
                                </span>
                            </div>
                        </div>
                    </ul>
                </div>
                <!--news-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>