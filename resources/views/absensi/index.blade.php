<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Absensi Santri - Ponpes Darul Ulum</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body class="bg-emerald-50 p-4 md:p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-xl shadow-lg border-t-4 border-emerald-600">
        <div class="text-center mb-8">
            <h1 class="text-2xl md:text-3xl font-bold text-emerald-800">PONDOK PESANTREN DARUL ULUM</h1>
            <p class="text-sm text-gray-600 mt-1">Sistem Informasi Absensi Harian Santri (Serverless Production)</p>
        </div>

        @if(session('success'))
            <div class="bg-emerald-100 text-emerald-800 p-3 rounded-lg mb-6 text-sm font-medium">✅ {{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="md:col-span-1 bg-gray-50 p-4 rounded-lg h-fit">
                <h2 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Input Absensi</h2>
                <form action="{{ route('absensi.store') }}" method="POST" class="space-y-3">
                    @csrf
                    <div>
                        <label class="text-xs font-semibold text-gray-600">NISN Santri</label>
                        <input type="text" name="nisn" required class="w-full p-2 border rounded mt-1 bg-white" placeholder="Contoh: 00412345">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600">Nama Lengkap</label>
                        <input type="text" name="nama_santri" required class="w-full p-2 border rounded mt-1 bg-white" placeholder="Nama Santri">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600">Kamar / Kelas</label>
                        <input type="text" name="kamar_kelas" required class="w-full p-2 border rounded mt-1 bg-white" placeholder="Kamar Al-Ghazali / 10A">
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600">Status Kehadiran</label>
                        <select name="status" required class="w-full p-2 border rounded mt-1 bg-white">
                            <option value="Hadir">Hadir</option>
                            <option value="Sakit">Sakit</option>
                            <option value="Izin">Izin</option>
                            <option value="Alpa">Alpa</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-xs font-semibold text-gray-600">Keterangan (Opsional)</label>
                        <textarea name="keterangan" class="w-full p-2 border rounded mt-1 bg-white" placeholder="Alasan izin/sakit..."></textarea>
                    </div>
                    <button type="submit" class="w-full bg-emerald-600 hover:bg-emerald-700 text-white p-2 rounded-lg font-semibold shadow transition">💾 Simpan Absensi</button>
                </form>
            </div>

            <div class="md:col-span-2">
                <h2 class="text-lg font-bold text-gray-700 mb-4 border-b pb-2">Jurnal Kehadiran Hari Ini</h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse bg-white rounded-lg overflow-hidden shadow-sm">
                        <thead>
                            <tr class="bg-emerald-600 text-white text-sm">
                                <th class="p-3">Santri</th>
                                <th class="p-3">Kamar/Kelas</th>
                                <th class="p-3">Status (Ubah Instan)</th>
                                <th class="p-3 text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-200">
                            @if($data_absensi->isEmpty())
                                <tr><td colspan="4" class="p-4 text-center text-gray-500 italic">Belum ada data absensi untuk hari ini.</td></tr>
                            @endif
                            @foreach($data_absensi as $absensi)
                                <tr class="hover:bg-gray-50">
                                    <td class="p-3">
                                        <div class="font-bold text-gray-800">{{ $absensi->nama_santri }}</div>
                                        <div class="text-xs text-gray-500">NISN: {{ $absensi->nisn }}</div>
                                    </td>
                                    <td class="p-3 text-gray-700">{{ $absensi->kamar_kelas }}</td>
                                    <td class="p-3">
                                        <form action="{{ route('absensi.update', $absensi->id) }}" method="POST">
                                            @csrf @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="text-xs font-semibold p-1 rounded border 
                                                {{ $absensi->status == 'Hadir' ? 'bg-green-100 text-green-800' : '' }}
                                                {{ $absensi->status == 'Sakit' ? 'bg-yellow-100 text-yellow-800' : '' }}
                                                {{ $absensi->status == 'Izin' ? 'bg-blue-100 text-blue-800' : '' }}
                                                {{ $absensi->status == 'Alpa' ? 'bg-red-100 text-red-800' : '' }}">
                                                <option value="Hadir" {{ $absensi->status == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                                <option value="Sakit" {{ $absensi->status == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                                <option value="Izin" {{ $absensi->status == 'Izin' ? 'selected' : '' }}>Izin</option>
                                                <option value="Alpa" {{ $absensi->status == 'Alpa' ? 'selected' : '' }}>Alpa</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-3 text-center">
                                        <form action="{{ route('absensi.destroy', $absensi->id) }}" method="POST" onsubmit="return confirm('Hapus data absensi santri ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white text-xs px-2 py-1 rounded hover:bg-red-600 transition shadow-sm">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>