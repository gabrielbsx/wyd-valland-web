<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(255, 55, 55, 0.5);">Ranking</span>
    </div>
    <div class="bg-black">
        <div class="py-12 place-items-center">
            <div class="mx-auto px-4 sm:px-8">
                <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
                    <div class="inline-block min-w-full overflow-hidden">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-6 bg-red-900 opacity-50 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                        Player
                                    </th>
                                    <th class="px-5 py-6 bg-red-900 opacity-50 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                        Level
                                    </th>
                                    <th class="px-5 py-6 bg-red-900 opacity-50 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                        Classe
                                    </th>
                                    <th class="px-5 py-6 bg-red-900 opacity-50 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                        Evolução
                                    </th>
                                    <th class="px-5 py-6 bg-red-900 opacity-50 text-left text-xs font-semibold text-gray-100 uppercase tracking-wider">
                                        Guild
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="bg-black text-sm">
                                        <p class="text-gray-200">
                                            Vera Carpenter
                                        </p>
                                    </td>
                                    <td class="bg-black text-sm">
                                        <p class="text-gray-200">
                                            200
                                        </p>
                                    </td>
                                    <td class="bg-black text-sm">
                                        <p class="text-gray-200">
                                            Foema
                                        </p>
                                    </td>
                                    <td class="bg-black text-sm">
                                        <p class="text-gray-200">
                                            Mortal
                                        </p>
                                    </td>
                                    <td class="bg-black text-sm">
                                        <p class="text-gray-200">
                                            Mortal
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    </div>
</div>
<?= $this->endSection() ?>