<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <script src="https://cdn.tailwindcss.com"></script>
  <title>Tambah Event</title>
</head>
<body class="bg-gray-100 min-h-screen flex items-center justify-center p-4">

  <div class="bg-white rounded-lg shadow p-6 w-full max-w-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-800">Tambah Event</h1>

    @if ($errors->any())
      <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc pl-5">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('events.store') }}" method="POST">
      @csrf
      <label for="title" class="block text-sm font-medium text-gray-700 mb-1">Judul</label>
      <input type="text" name="title" id="title" required
             value="{{ old('title') }}"
             class="mb-4 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />

      <label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
      <textarea name="description" id="description" rows="3" required
                class="mb-4 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500">{{ old('description') }}</textarea>

      <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
      <input type="date" name="date" id="date" required
             value="{{ old('date') }}"
             class="mb-6 w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500" />

      <div class="flex justify-between items-center">
        <a href="{{ route('events.index') }}" class="text-gray-600 hover:underline">Batal</a>
        <button type="submit" 
                class="bg-amber-500 text-white px-4 py-2 roundedtransition">Simpan</button>
      </div>
    </form>
  </div>

</body>
</html>
