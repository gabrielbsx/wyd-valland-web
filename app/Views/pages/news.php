<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>

<div class="container flex">
    <div style="background: black; width:100vw;" class="info-panel">
        <div class="middle-info-block">
            <div class="flex">
                <div class="news" style="width: 100%;">
                    <?php if (isset($news)) : ?>
                        <div class="title pb-6 px-4" style="border-bottom: 0.1rem solid rgba(155, 155, 155, 0.4)">
                            <?= $news['title'] ?> | <?= $news['updated_at'] ?? $news['created_at'] ?>
                        </div>
                        <ul class="topic_list topic_list-news">
                            <div class="px-24">
                                <?= $news['content'] ?>
                            </div>
                            <div class="grid grid-cols-5 items-center">
                                <div class="col-span-2"></div>
                                <div class="col-span-1 flex items-center justify-center">
                                    <button>
                                        <a href="<?= base_url('site') ?>">
                                            Voltar
                                        </a>
                                    </button>
                                </div>
                                <div class="col-span-2"></div>
                            </div>
                        </ul>
                    <?php else : ?>
                        <div class="title pb-6 px-4" style="border-bottom: 0.1rem solid rgba(155, 155, 155, 0.4);">
                            Notícia inexistente!
                        </div>
                        <ul class="topic_list topic_list-news items-center grid px-36">
                            <a class="w-full bg-red-900 text-center py-4 rounded-lg hover:bg-red-800" href="<?= base_url('site') ?>">
                                Voltar
                            </a>
                        </ul>
                    <?php endif; ?>
                </div>
                <!--news-->
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>