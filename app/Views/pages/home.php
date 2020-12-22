<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container flex">
    <div class="streamBlock">
        <span class="title">
            Ranking
            <a href="#" target="_blank"></a>
        </span>
        <div class="streamBlock_flex flex" style="background-color: black;height:100%;">
            <?php if (isset($ranking)) : ?>
                <table>
                    <tr class="w-full">
                        <td class="px-2">
                            Player
                        </td>
                        <td class="px-2">
                            Level
                        </td>
                        <td class="px-2">
                            Classe
                        </td>
                        <td class="px-2">
                            Evolução
                        </td>
                        <td class="px-2">
                            Guild
                        </td>
                    </tr>
                    <tr class="w-full">
                        <td class="px-2 bg-black">
                            Player
                        </td>
                        <td class="px-2 bg-black">
                            Level
                        </td>
                        <td class="px-2 bg-black">
                            Classe
                        </td>
                        <td class="px-2 bg-black">
                            Evolução
                        </td>
                        <td class="px-2 bg-black">
                            Guild
                        </td>
                    </tr>
                </table>
            <?php else : ?>
                <div class="justify-center text-center col-md-12 mt-6 text-white">
                    Aguardando atualização!
                </div>
            <?php endif; ?>
        </div>
    </div>
    <div style="background: black" class="info-panel">
        <div class="middle-info-block">
            <div style="background: #101010;">
                <div class="row">
                    <div class="col-md-12 justify-center py-6 flex">
                        <div class="col-2 text-center flex">
                            Armia
                            <span class="ml-2">
                                <img class="block" src="<?= base_url('img_guilds/b01000000.bmp') ?>">
                            </span>
                        </div>
                        <div class="col-2 text-center flex">
                            Arzam
                            <span class="ml-2">
                                <img class="block" src="<?= base_url('img_guilds/b01000000.bmp') ?>">
                            </span>
                        </div>
                        <div class="col-2 text-center flex">
                            Erion
                            <span class="ml-2">
                                <img class="block" src="<?= base_url('img_guilds/b01000000.bmp') ?>">
                            </span>
                        </div>
                        <div class="col-2 text-center flex">
                            Gelo
                            <span class="ml-2">
                                <img class="block" src="<?= base_url('img_guilds/b01000000.bmp') ?>">
                            </span>
                        </div>
                        <div class="col-2 text-center flex">
                            Noatun
                            <span class="ml-2">
                                <img class="block" src="<?= base_url('img_guilds/b01000000.bmp') ?>">
                            </span>
                        </div>
                    </div>
                    <div style="padding-left: 40px;" class="middle-info-online col-lg-4 col-md-4 col-sm-4 col-12" style="background: url(<?= base_url('img/ico-off.png') ?>) no-repeat left; filter: brightness(250%);">
                        <small>Online</small><br>
                        <span class='game-off'>0</span></div>
                    <div class="middle-info-server col-lg-4 col-md-4 col-sm-4 col-12">
                        <small>Próxima Atualização</small><br>
                        <div style="color: #f3f3f3; font-size: 12px">
                            12 de setembro
                        </div>
                    </div>
                    <div class="middle-info-enemy col-lg-4 col-md-4 col-sm-4 col-12">
                        <small>Reinos</small><br>
                        <span class='red'>
                            50
                        </span>
                        :
                        <span class='red' style="color: rgb(70, 70, 214)">
                            50
                        </span>
                    </div>
                </div>
            </div>
            <div class="flex">
                <div class="news" style="width: 100%; border-top: 1px solid rgba(255, 55, 55, 0.25); background: rgba(55, 55, 55, 0.12);">
                    <div class="mb-4">
                        <?= view('template/message') ?>
                    </div>
                    <span class="title">
                        Notícias
                    </span>
                    <ul class="topic_list topic_list-news">
                        <?php if ($news_paginate) : ?>
                            <?php foreach ($news_paginate as $key => $value) : ?>
                                <li>
                                    <i class="icon icon-news"></i>
                                    <div class="topic_list-info">
                                        <a href="<?= base_url('site/news/' . $value['id']) ?>" class="topic-title" title="<?= $value['title'] ?>">
                                            <?= $value['title'] ?>
                                        </a>
                                        <span><?= $value['updated_at'] ?? $value['created_at'] ?></span>
                                    </div>
                                </li>
                            <?php endforeach; ?>
                            <?php if ($news_pager) : ?>
                                <?= $news_pager->links('news', 'pagination') ?>
                            <?php endif; ?>
                        <?php else : ?>
                            <li>
                                <i class="icon icon-news"></i>
                                <div class="topic_list-info">
                                    <a href="#" class="topic-title" title="Não há notícias">
                                        Não há notícias
                                    </a>
                                </div>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>