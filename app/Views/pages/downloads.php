<?= $this->extend('layouts') ?>
<?= $this->section('page') ?>
<div class="container mx-auto col-span-6 py-8 px-4">
    <div class="grid text-center">
        <span class="text-gray-300 z-0 bg-black py-4 text-2xl" style="border-bottom: 1px solid rgba(155, 55, 55, 0.5);">Downloads</span>
    </div>
    <div class="px-6 py-4 bg-black">
        <div class="justify-center flex pb-4">
            <a class="mx-2" href="#">
                <button>
                    Mediafire
                </button>
            </a>
            <a class="mx-2" href="#">
                <button>
                    4shared
                </button>
            </a>
            <a class="mx-2" href="#">
                <button>
                    Mega
                </button>
            </a>
        </div>
        <div class="inline-grid lg:flex shadow-lg pb-6 lg:pb-0">
            <table class="min-w-full table-auto">
                <thead class="justify-between">
                    <tr class="bg-gray-700 text-left rounded-t-lg">
                        <th class="py-4" colspan="1">
                        </th>
                        <th class="py-4" colspan="1">
                            <span class="text-gray-300">Mínimo</span>
                        </th>
                        <th class="py-4" colspan="1">
                            <span class="text-gray-300">Recomendado</span>
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-gray-800">
                    <tr class="rounded-b-lg text-white text-left">
                        <td class="py-3 pl-4">
                            <span class="font-semibold">Processadores</span>
                        </td>
                        <td class="py-3">
                            <span>Intel Pentium 4 1.5 GHz</span>
                        </td>
                        <td class="py-3">
                            <span>Intel Pentium 4 2.8 GHz +</span>
                        </td>
                    </tr>
                    <tr class="rounded-b-lg text-white text-left">
                        <td class="py-3 pl-4">
                            <span class="font-semibold">Memória RAM</span>
                        </td>
                        <td class="py-3">
                            <span>512 MB</span>
                        </td>
                        <td class="py-3">
                            <span>1 GB</span>
                        </td>
                    </tr>
                    <tr class="rounded-b-lg text-white text-left">
                        <td class="py-3 pl-4">
                            <span class="font-semibold">Placa de Vídeo</span>
                        </td>
                        <td class="py-3">
                            <span>NVidia FX 52000 / ATI Radeon 9500</span>
                        </td>
                        <td class="py-3">
                            <span>NVidia GeForce 6600 / ATI Radeon 9800</span>
                        </td>
                    </tr>
                    <tr class="rounded-b-lg text-white text-left">
                        <td class="py-3 pl-4">
                            <span class="font-semibold">Hard Disk</span>
                        </td>
                        <td class="py-3">
                            <span>500 MB</span>
                        </td>
                        <td class="py-3">
                            <span>1 GB</span>
                        </td>
                    </tr>
                    <tr class="rounded-b-lg text-white text-left">
                        <td class="py-3 pl-4">
                            <span class="font-semibold">Sistema</span>
                        </td>
                        <td class="py-3">
                            <span>Windows XP</span>
                        </td>
                        <td class="py-3">
                            <span>Windows 7 +</span>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>