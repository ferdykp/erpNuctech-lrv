<div x-data="{ openModal: false, detail: {} }">

    <div class="overflow-x-auto border rounded-lg shadow-sm">
        <table class="w-full text-sm bg-white">
            <thead class="text-gray-700 bg-gray-100 border-b">
                <tr>
                    <th class="px-4 py-3 text-left">No.</th>
                    <th class="px-4 py-3 text-left">Custom Code</th>
                    <th class="px-4 py-3 text-left">Custom Name</th>
                    <th class="px-4 py-3 text-left">Custom Abbreviation</th>
                    <th class="px-4 py-3 text-left">Industry Class</th>
                    <th class="px-4 py-3 text-left">Action</th>
                </tr>
            </thead>

            <tbody class="divide-y">
                @forelse ($data as $item)
                    <tr class="transition hover:bg-gray-50">
                        <td class="px-4 py-3">{{ $item->id }}</td>
                        <td class="px-4 py-3">{{ $item->custom_code }}</td>
                        <td class="px-4 py-3">{{ $item->custom_name }}</td>
                        <td class="px-4 py-3">{{ $item->custom_abbrev }}</td>
                        <td class="px-4 py-3">{{ $item->industry_class }}</td>

                        <td class="gap-2 d-flex justify-content-center">

                            <button
                                class="px-4 py-2 transition-all duration-300 bg-blue-400 rounded-lg hover:bg-blue-600"
                                @click="
                                    detail = {{ json_encode($item) }};
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
        class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50" @click.self="openModal = false">

        <div x-show="openModal" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 scale-90" x-transition:enter-end="opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-90" class="w-full max-w-2xl p-6 bg-white shadow-xl rounded-xl">

            <h2 class="pb-3 mb-5 text-2xl font-bold text-gray-800 border-b">
                Detail Data Custom
            </h2>

            <!-- =========== TABEL DETAIL =========== -->
            <table class="w-full text-sm border-collapse">
                <tbody>

                    <tr class="border">
                        <td class="w-1/3 p-3 font-semibold text-gray-700 bg-gray-50">No.</td>
                        <td class="p-3 text-gray-900" x-text="detail.id"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Custom Code</td>
                        <td class="p-3 text-gray-900" x-text="detail.custom_code"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Custom Name</td>
                        <td class="p-3 text-gray-900" x-text="detail.custom_name"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Custom Abbreviation</td>
                        <td class="p-3 text-gray-900" x-text="detail.custom_abbrev"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Industry Class</td>
                        <td class="p-3 text-gray-900" x-text="detail.industry_class"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">No. Telephone</td>
                        <td class="p-3 text-gray-900" x-text="detail.no_telp"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Seller</td>
                        <td class="p-3 text-gray-900" x-text="detail.seller"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Fax</td>
                        <td class="p-3 text-gray-900" x-text="detail.fax"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Email</td>
                        <td class="p-3 text-gray-900" x-text="detail.email"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Entry Person</td>
                        <td class="p-3 text-gray-900" x-text="detail.entry_person"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Entry Time</td>
                        <td class="p-3 text-gray-900" x-text="detail.entry_time"></td>
                    </tr>

                    <tr class="border">
                        <td class="p-3 font-semibold text-gray-700 bg-gray-50">Is It Affective</td>
                        <td class="p-3 text-gray-900" x-text="detail.isIt_affective"></td>
                    </tr>

                </tbody>
            </table>
            <!-- =========== END TABEL DETAIL =========== -->

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
