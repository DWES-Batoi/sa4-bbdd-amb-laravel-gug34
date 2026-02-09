<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200">
            Classificació
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-4">

            <div id="alerta" class="hidden mb-4 p-2 border rounded text-sm">
                Classificació actualitzada en temps real ✅
            </div>

            <div class="bg-white dark:bg-gray-800 shadow rounded overflow-hidden">
                <table class="w-full text-gray-900 dark:text-gray-100">
                    <thead class="bg-gray-100 dark:bg-gray-700">
                        <tr class="text-left border-b dark:border-gray-600">
                            <th
                                class="p-4 text-center font-extrabold text-black dark:text-white uppercase text-base tracking-wider">
                                Pos</th>
                            <th
                                class="p-4 font-extrabold text-black dark:text-white uppercase text-base tracking-wider">
                                Equip</th>
                            <th
                                class="p-4 font-extrabold text-black dark:text-white uppercase text-base tracking-wider">
                                Punts</th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200 dark:divide-gray-600">
                        @foreach($equips as $equip)
                            <tr data-equip-id="{{ $equip->id }}"
                                class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                <td class="p-4 text-center font-black text-black dark:text-white text-xl">
                                    {{ $statsMap[$equip->id]['posicio'] ?? '-' }}
                                </td>
                                <td class="p-4 font-bold text-gray-800 dark:text-gray-200 text-lg">
                                    {{ $equip->nom }}
                                </td>
                                <td class="p-4 font-black text-indigo-700 dark:text-indigo-300 text-xl">
                                    {{ $statsMap[$equip->id]['punts'] ?? 0 }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <script>
        window.addEventListener('classificacio-delta', (ev) => {
            // alerta
            const a = document.getElementById('alerta');
            if (a) {
                a.classList.remove('hidden');
                setTimeout(() => a.classList.add('hidden'), 2500);
            }

            // colors & stats
            (ev.detail || []).forEach(item => {
                const row = document.querySelector(`[data-equip-id="${item.equip_id}"]`);
                if (!row) return;

                row.classList.remove('puja', 'baixa');
                if (item.delta > 0) row.classList.add('puja');
                if (item.delta < 0) row.classList.add('baixa');

                if (item.stats) {
                    const cells = row.querySelectorAll('td');
                    // Índexs basats en l'ordre: Pos, Equip, Punts
                    if (cells.length >= 3) {
                        cells[0].innerText = item.stats.posicio;
                        // cells[1] nom equip
                        cells[2].innerText = item.stats.punts;
                    }
                }
            });
        });
    </script>

    <style>
        .puja {
            background-color: #d1fae5 !important;
            /* green-100 */
        }

        .dark .puja {
            background-color: #065f46 !important;
            /* green-800 */
            color: #ffffff !important;
        }

        .baixa {
            background-color: #fee2e2 !important;
            /* red-100 */
        }

        .dark .baixa {
            background-color: #991b1b !important;
            /* red-800 */
            color: #ffffff !important;
        }
    </style>
</x-app-layout>