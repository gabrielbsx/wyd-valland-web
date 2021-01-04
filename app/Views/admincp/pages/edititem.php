<?= $this->extend('admincp/layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <?php if (isset($bonus)) : ?>
        <form action="<?= base_url('auth/edititem') ?>" method="POST">
            <div class="grid text-gray-300 text-center bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4">
                <span class="z-0 text-2xl bg-transparent text-center">Editor de itens para pacotes de doações</span>
            </div>
            <div class="bg-black rounded-b-lg">
                <div class="px-24 py-12 text-white place-items-center">
                    <!--
                    <label for="itemcode" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Código do item</label>
                    <input id="itemcode" type="text" name="itemcode" value="" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    -->

                    <label for="itemname" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Nome do item</label>
                    <input id="itemname" type="text" name="itemname" value="<?= $bonus['itemname'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="itemid" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">ID do item</label>
                    <input id="itemid" type="number" name="itemid" value="<?= $bonus['iditem'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect1" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Efeito 1</label>
                    <input id="effect1" type="number" name="effect1" value="<?= $bonus['effect1'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect_value1" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Valor do efeito 1</label>
                    <input id="effect_value1" type="number" name="effect_value1" value="<?= $bonus['effect_value1'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect2" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Efeito 2</label>
                    <input id="effect2" type="number" name="effect2" value="<?= $bonus['effect2'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect_value2" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Valor do efeito 2</label>
                    <input id="effect_value2" type="number" name="effect_value2" value="<?= $bonus['effect_value2'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect3" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Efeito 3</label>
                    <input id="effect3" type="number" name="effect3" value="<?= $bonus['effect3'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <label for="effect_value3" class="block mt-2 text-xs font-semibold text-gray-400 uppercase">Valor do efeito 3</label>
                    <input id="effect_value3" type="number" name="effect_value3" value="<?= $bonus['effect_value3'] ?>" class="mb-4 block rounded w-full p-3 mt-2 text-gray-200 bg-gray-800 appearance-none focus:outline-none focus:bg-gray-900 focus:shadow-inner" required />
                    
                    <input type="hidden" name="id" value="<?= $bonus['id'] ?>">
                    <?php if (isset($recaptcha)) : ?>
                        <div class="g-recaptcha" data-sitekey="<?= $recaptcha ?>"></div>
                    <?php endif; ?>
                    <button type="submit" class="w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-800 rounded border-b-4 border-gray-700 shadow-lg focus:outline-none hover:bg-gray-900 hover:shadow-none">
                        Editar
                    </button>
                    <a href="<?= base_url('admin/donate') ?>" class="block text-center w-full py-3 mt-6 font-medium tracking-widest text-white uppercase bg-gray-900 rounded border-b-4 border-gray-800 shadow-lg focus:outline-none hover:bg-gray-800 hover:border-gray-700 hover:shadow-none">
                        Voltar
                    </a>
                </div>
            </div>
        </form>
    <?php else : ?>
        <div class="grid text-center">
            <span class="text-gray-300 z-0 bg-gradient-to-b from-gray-900 to-gray-800 border-t-4 border-gray-800 rounded-lg py-4 text-2xl">Editor de items para pacotes de doações</span>
        </div>
        <div class="bg-black rounded-b-lg">
            <div class="px-48 py-12 text-center text-white place-items-center">
                Item inexistente
            </div>
        </div>
    <?php endif; ?>
</div>
<?= $this->endSection() ?>