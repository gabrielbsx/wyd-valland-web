<nav x-data="{show:false}" class="flex mt-4 md:mx-auto md:container rounded border-b-4 mb-12 border-gray-600 rounded-lg justify-between items-center bg-gradient-to-b from-gray-800 to-gray-900 p-3 flex-wrap">
    <button @click="show=!show" class="text-white inline-flex p-3 hover:bg-gray-900 rounded lg:hidden ml-auto hover:text-white outline-none nav-toggler" data-target="#navigation">
        <i class="material-icons">menu</i>
    </button>
    <a href="<?= base_url('site') ?>" class="p-2 mr-4 inline-flex items-center">
        <img class="w-20 hover:opacity-100 opacity-80" src="<?= base_url('images/logo-2.png') ?>">
    </a>
    <div @click.away="show = false" :class="{ 'block': show, 'hidden': !show }" class="hidden top-navbar w-full lg:inline-flex lg:flex-grow lg:w-auto" id="navigation">
        <div class="lg:inline-flex lg:flex-row lg:mr-auto lg:w-auto w-full lg:items-center items-start flex flex-col lg:h-auto">
            <a href="<?= base_url('site/downloads') ?>" class="lg:inline-flex lg:w-auto w-full px-6 py-2 rounded-lg text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>Downloads</span>
            </a>
            <a href="<?= base_url('site/ranking') ?>" class="lg:inline-flex lg:w-auto w-full px-6 py-2 rounded-lg text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>Ranking</span>
            </a>
            <a href="<?= base_url('site/aboutus') ?>" class="lg:inline-flex lg:w-auto w-full px-6 py-2 rounded-lg text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>Sobre nós</span>
            </a>
            <a href="<?= base_url('site/faq') ?>" class="lg:inline-flex lg:w-auto w-full px-6 py-2 rounded-lg text-gray-400 items-center justify-center hover:bg-gray-900 hover:text-white">
                <span>FAQ</span>
            </a>
        </div>
    </div>
</nav>