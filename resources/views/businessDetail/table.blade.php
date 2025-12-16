<div x-data="{ openModal: false, manage: {} }">

    <div class="overflow-x-auto border rounded-lg shadow-sm">
        <table class="w-full text-sm bg-white">
            <thead class="text-gray-700 bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 text-left">No.</th>
                    <th class="px-4 py-3 text-left">No. Order</th>
                    <th class="px-4 py-3 text-left">Status Order</th>
                    <th class="px-4 py-3 text-left">Custom Abbreviation</th>
                    <th class="px-4 py-3 text-left">Total</th>
                    <th class="px-4 py-3 text-left">Order Form</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($data as $item)
                    <tr class="transition hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item->id }}</td>
                        <td class="px-4 py-3">{{ $item->no_order }}</td>
                        <td class="px-4 py-3">{{ $item->status_order }}</td>
                        <td class="px-4 py-3">{{ $item->custom_abbrev }}</td>
                        <td class="px-4 py-3">{{ $item->total }}</td>

                        <td class="gap-2 d-flex justify-content-center">

                            <button
                                class="px-4 py-2 transition-all duration-300 bg-blue-400 rounded-lg hover:bg-blue-600"
                                @click="
                                    manage = {{ json_encode($item) }};
                                    openModal = true;
                                ">
                                Detail
                            </button>

                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-4 py-6 text-center text-gray-500">
                            Tidak ada data ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        <div class="p-2">
            {{ $data->links() }}
        </div>
    </div>

    <!-- ============ MODAL ============ -->
    <div x-show="openModal" x-cloak x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center p-4 bg-black bg-opacity-50"
        @click.self="openModal = false">

        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90"
            class="w-full max-w-3xl p-6 bg-white shadow-2xl rounded-xl max-h-[90vh] overflow-y-auto">

            <h2 class="pb-3 mb-5 text-2xl font-bold text-gray-800 border-b">
                Detail Data Custom
            </h2>

            <!-- Wrapper scroll untuk tabel -->
            <div class="overflow-x-auto">
                <table class="w-full text-sm border-collapse">
                    <tbody class="divide-y">

                        <template x-for="(value, key) in manage">
                            <tr>
                                <td class="w-1/3 p-3 font-semibold text-gray-700 capitalize bg-gray-50">
                                    <span x-text="key.replace('_', ' ')"></span>
                                </td>
                                <td class="p-3 text-gray-900">
                                    <span x-text="value"></span>
                                </td>
                            </tr>
                        </template>

                    </tbody>
                </table>
            </div>

            <div class="mt-6 text-right">
                <button class="px-5 py-2 text-white bg-red-500 rounded-lg shadow hover:bg-red-600"
                    @click="openModal = false">
                    Close
                </button>
            </div>

        </div>

    </div>
    <!-- ============ END MODAL ============ -->


</div>
