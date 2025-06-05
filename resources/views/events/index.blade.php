<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
  <title>Event Management</title>
  <style>
    @media (max-width: 640px) {
      .action-buttons {
        display: flex;
        flex-direction: row;
        gap: 0.5rem;
        justify-content: flex-end;
      }
      .action-btn {
        width: 34px;
        height: 34px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
      }
      .action-text {
        display: none;
      }
    }
    @media (min-width: 641px) {
      .action-btn {
        padding: 0.25rem 0.5rem;
        border-radius: 0.25rem;
      }
      .action-text {
        display: inline;
        margin-left: 0.25rem;
      }
    }
    .floating-btn {
      transition: all 0.3s ease;
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    .floating-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 sm:py-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <div class="flex items-center space-x-3 sm:space-x-4">
        <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 transition-colors">
          <i class="fas fa-arrow-left text-lg"></i>
        </a>
        <h1 class="text-lg sm:text-xl font-bold text-gray-800">Event Management</h1>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="max-w-6xl mx-auto p-4 sm:p-6">
    @if (session('success'))
      <div class="mb-4 p-3 bg-green-100 text-green-800 rounded">
        {{ session('success') }}
      </div>
    @endif

    <!-- Event List -->
    <div class="bg-white rounded-lg shadow overflow-x-auto">
      <div class="grid grid-cols-12 bg-gray-50 px-3 sm:px-4 py-2 sm:py-3 border-b border-gray-200 text-gray-600 font-medium text-xs sm:text-sm uppercase tracking-wider">
        <div class="col-span-1">No</div>
        <div class="col-span-3">Title</div>
        <div class="col-span-4">Description</div>
        <div class="col-span-2">Date</div>
        <div class="col-span-2 text-right">Actions</div>
      </div>

      @forelse ($events as $event)
        <div class="grid grid-cols-12 px-3 sm:px-4 py-3 border-b border-gray-100 hover:bg-gray-50 items-center">
          <div class="col-span-1 text-gray-500 text-sm sm:text-base">{{ $loop->iteration }}</div>
          <div class="col-span-3 text-gray-800 text-sm sm:text-base truncate">{{ $event->title }}</div>
          <div class="col-span-4 text-gray-800 text-sm sm:text-base truncate">{{ $event->description }}</div>
          <div class="col-span-2 text-sm text-gray-600">
            {{ \Carbon\Carbon::parse($event->date)->format('d M Y') }}
          </div>
          <div class="col-span-2 flex justify-end">
            <div class="action-buttons">
              <a href="{{ route('events.edit', $event->id) }}"
                 class="action-btn bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors"
                 title="Edit">
                <i class="fas fa-edit text-sm"></i>
                <span class="action-text text-sm">Edit</span>
              </a>
              <form action="{{ route('events.destroy', $event->id) }}" method="POST" onsubmit="return confirm('Hapus event ini?')" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="action-btn bg-red-50 text-red-600 hover:bg-red-100 transition-colors"
                        title="Delete">
                  <i class="fas fa-trash-alt text-sm"></i>
                  <span class="action-text text-sm">Delete</span>
                </button>
              </form>
            </div>
          </div>
        </div>
      @empty
        <div class="px-4 py-6 text-center text-gray-500">
          <i class="fas fa-calendar-times text-2xl sm:text-3xl mb-2 text-gray-300"></i>
          <p class="text-sm sm:text-base">No events found</p>
        </div>
      @endforelse
    </div>
  </main>

  <a href="{{ route('events.create') }}" 
     class="floating-btn fixed bottom-5 right-5 bg-blue-600 text-white rounded-full p-4 hover:bg-blue-700 transition duration-200"
     title="Add User">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <line x1="12" y1="5" x2="12" y2="19"></line>
      <line x1="5" y1="12" x2="19" y2="12"></line>
    </svg>
    <span class="sr-only">Add User</span>
  </a>

</body>
</html>
