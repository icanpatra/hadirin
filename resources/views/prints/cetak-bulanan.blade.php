<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Cetak Kehadiran Bulanan - {{ $bulanTahun }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body class="p-4 bg-white">

  <div class="max-w-5xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Laporan Kehadiran Bulanan</h1>
    <p class="mb-6">Bulan: <strong>{{ $bulanTahun }}</strong></p>

    <button onclick="window.print()" class="no-print mb-4 px-4 py-2 bg-blue-600 text-white rounded">Cetak</button>

    <table class="w-full border-collapse border border-gray-300 text-sm">
      <thead>
        <tr>
          <th class="border border-gray-300 px-2 py-1">No</th>
          <th class="border border-gray-300 px-2 py-1">Nama</th>
          <th class="border border-gray-300 px-2 py-1">Tanggal</th>
          <th class="border border-gray-300 px-2 py-1">Status Kehadiran</th>
          <th class="border border-gray-300 px-2 py-1">Waktu Scan</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($presences as $index => $presence)
          <tr>
            <td class="border border-gray-300 px-2 py-1 text-center">{{ $index + 1 }}</td>
            <td class="border border-gray-300 px-2 py-1">{{ $presence->user->name ?? 'User tidak ditemukan' }}</td>
            <td class="border border-gray-300 px-2 py-1 text-center">{{ \Carbon\Carbon::parse($presence->scan_time)->format('d M Y') }}</td>
            <td class="border border-gray-300 px-2 py-1 text-center">
              Hadir
            </td>
            <td class="border border-gray-300 px-2 py-1 text-center">{{ \Carbon\Carbon::parse($presence->scan_time)->format('H:i:s') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="5" class="text-center py-4">Data tidak ditemukan untuk bulan ini.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>
