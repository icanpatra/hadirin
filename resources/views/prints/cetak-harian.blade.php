<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Cetak Kehadiran Harian - {{ $tanggal }}</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @media print {
      .no-print { display: none; }
    }
  </style>
</head>
<body class="p-4 bg-white">

  <div class="max-w-4xl mx-auto">
    <h1 class="text-2xl font-bold mb-4">Laporan Kehadiran Harian</h1>
    <p class="mb-6">Tanggal: <strong>{{ \Carbon\Carbon::parse($tanggal)->format('d F Y') }}</strong></p>

    <button onclick="window.print()" class="no-print mb-4 px-4 py-2 bg-amber-500 text-white rounded">Print</button>

    <table class="w-full border-collapse border border-gray-300">
      <thead>
        <tr>
          <th class="border border-gray-300 px-3 py-1">No</th>
          <th class="border border-gray-300 px-3 py-1">Nama</th>
          <th class="border border-gray-300 px-3 py-1">Status Kehadiran</th>
          <th class="border border-gray-300 px-3 py-1">Waktu Scan</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($presences as $index => $presence)
          <tr>
            <td class="border border-gray-300 px-3 py-1 text-center">{{ $index + 1 }}</td>
            <td class="border border-gray-300 px-3 py-1">{{ $presence->user->name ?? 'User tidak ditemukan' }}</td>
            <td class="border border-gray-300 px-3 py-1 text-center">
              {{-- Contoh status: Hadir jika scan_time ada --}}
              Hadir
            </td>
            <td class="border border-gray-300 px-3 py-1 text-center">{{ \Carbon\Carbon::parse($presence->scan_time)->format('H:i:s') }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="text-center py-4">Data tidak ditemukan untuk tanggal ini.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>

</body>
</html>
