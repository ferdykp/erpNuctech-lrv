<div class="overflow-x-auto border rounded-lg shadow-sm">
    <table class="w-full text-sm bg-white">
        <thead class="text-gray-700 bg-gray-100 border-b">
            <tr>
                <th class="px-4 py-3 text-left">ID</th>
                <th class="px-4 py-3 text-left">Nomor Dokumen</th>
                <th class="px-4 py-3 text-left">Kontak</th>
                <th class="px-4 py-3 text-left">Total Pendapatan (YingShouZongJinE)</th>
                <th class="px-4 py-3 text-left">Tanggal Input (RuLuRiQi)</th>
            </tr>
        </thead>

        <tbody class="divide-y">
            @forelse ($data as $item)
                <tr class="transition hover:bg-gray-50">
                    <td class="px-4 py-3">{{ $item->WTD_ID }}</td>
                    <td class="px-4 py-3">{{ $item->WeiTuoDanHao }}</td>
                    <td class="px-4 py-3">{{ $item->LianXiRen }}</td>
                    <td class="px-4 py-3">{{ $item->YingShouZongJinE }}</td>
                    <td class="px-4 py-3">{{ $item->RuLuRiQi }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="px-4 py-6 text-center text-gray-500">
                        Tidak ada data ditemukan.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<div class="mt-6">
    <div class="p-2">
        {{ $data->links('vendor.pagination.tailwind') }}
    </div>
</div>
