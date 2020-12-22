<?= $this->extend('dashboard/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Guildmark</span>
    </div>
    <div class="bg-black py-6 px-12">
        <div class="text-white text-center place-items-center">
            <form enctype="multipart/form-data" method="POST" action="<?= base_url('auth/guildmark') ?>" class="mt-6">
                <div class="guildmarks py-3 text-white mb-4 text-center" style="border-bottom: 1px solid rgba(55, 55, 1   55, 0.5);">
                    <div class="py-3 mx-4 mb-4 text-center">
                        Guild's permitidas!
                    </div>
                    <div>
                        <select class="guilds py-2 px-48 form-select mb-4 text-center" name="guildid" required>
                        </select>
                    </div>
                    <div class="flex w-full items-center justify-center mb-4">
                        <label class="w-64 flex flex-col items-center px-4 py-2 text-white uppercase cursor-pointer hover:text-white">
                            <div class="flex">
                                <svg class="w-8 h-8" fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path d="M16.88 9.1A4 4 0 0 1 16 17H5a5 5 0 0 1-1-9.9V7a3 3 0 0 1 4.52-2.59A4.98 4.98 0 0 1 17 8c0 .38-.04.74-.12 1.1zM11 11h3l-4-4-4 4h3v3h2v-3z" />
                                </svg>
                                <span class="mt-1 ml-3">Guildmark</span>
                            </div>
                            <input class="hidden" type="file" accept="image/bmp" name="guildmark" required>
                        </label>
                    </div>
                    <?php if (isset($recaptcha)) : ?>
                        <div class="flex justify-center mt-5 flex-wrap">
                            <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                        </div>
                    <?php endif; ?>
                    <button type="submit">
                        Enviar guildmark
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>