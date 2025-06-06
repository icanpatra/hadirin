<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cetak Kartu Anggota</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/davidshimjs-qrcodejs@0.0.2/qrcode.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @media print {
      body { 
        background-color: white;
        padding: 0;
        margin: 0;
      }
      .navigation, .no-print { 
        display: none !important; 
      }
      .id-card {
        page-break-inside: avoid;
        box-shadow: none;
        margin: 10px;
      }
      .hover\:shadow-lg {
        box-shadow: none !important;
      }
    }
    
    .id-card-gradient {
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
    }
    
   
    
    /* Animation for cards */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .id-card {
      animation: fadeIn 0.3s ease-out forwards;
      opacity: 0;
    }
    
    .id-card:nth-child(1) { animation-delay: 0.1s; }
    .id-card:nth-child(2) { animation-delay: 0.2s; }
    .id-card:nth-child(3) { animation-delay: 0.3s; }
    .id-card:nth-child(4) { animation-delay: 0.4s; }
    .id-card:nth-child(5) { animation-delay: 0.5s; }
    .id-card:nth-child(n+6) { animation-delay: 0.6s; }
  </style>
</head>
<body class="bg-gray-100 min-h-screen">

  <!-- Header -->
  <header class="bg-white shadow-sm">
    <div class="max-w-7xl mx-auto px-4 py-3 sm:py-4 sm:px-6 lg:px-8 flex justify-between items-center">
      <div class="flex items-center space-x-3 sm:space-x-4">
        <a href="{{ url('/') }}" class="text-gray-600 hover:text-gray-900 transition-colors" title="Kembali ke Beranda">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 sm:h-6 sm:w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
          </svg>
        </a>
        <h1 class="text-lg sm:text-xl font-bold text-gray-800">
          Cetak Kartu Anggota
        </h1>
      </div>
    </div>
  </header>

  <div class="max-w-7xl mx-auto p-4 sm:p-6">
    <!-- Header Section -->
    <div class="bg-white rounded-lg shadow p-6 mb-6">
      <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
          <h2 class="text-xl font-semibold text-gray-800">Kartu Anggota</h2>
          <p class="text-gray-600">Dicetak pada: {{ date('d F Y H:i') }}</p>
        </div>
        <div class="flex gap-2 no-print">
          <button onclick="window.print()" class="bg-amber-500 text-white font-medium py-2 px-4 rounded-lg transition duration-300 flex items-center gap-2">
            <i class="fas fa-print"></i>
            Print
          </button>
        </div>
      </div>
    </div>

    <!-- Cards Container -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
      @foreach ($users as $user)
      <div class="id-card bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow duration-300 overflow-hidden border border-gray-200">
        <!-- Card Header -->
        <div class="bg-gradient-to-r from-blue-500 to-green-500 h-2 w-full"></div>
        
        <!-- Card Content -->
        <div class="p-5">
          <h3 class="text-lg font-bold text-center text-gray-800 mb-4">{{ $user->name }}</h3>
          
          <div class="flex flex-col sm:flex-row gap-4">
            <!-- QR Code -->
            <div class="flex-shrink-0 mx-auto sm:mx-0">
              <div class="border border-gray-200 p-1 rounded" id="qrcode-{{ $user->id }}"></div>
            </div>
            
            <!-- User Details -->
            <div class="flex-grow">
              <div class="space-y-2">
                <div>
                  <p class="text-sm font-medium text-gray-500">ID Anggota</p>
                  <p class="text-sm text-gray-800 font-mono">{{ $user->user_id }}</p>
                </div>
                @if($user->gender)
                <div>
                  <p class="text-sm font-medium text-gray-500">Jenis Kelamin</p>
                  <p class="text-sm text-gray-800">{{ ucfirst($user->gender) }}</p>
                </div>
                @endif
              </div>
            </div>
          </div>
        </div>
        
        <!-- Card Footer -->
        <div class="px-5 py-3 bg-gray-50 border-t border-gray-200">
          <p class="text-xs text-gray-500 text-right">ID: {{ $user->id }} | {{ date('Y') }}</p>
        </div>
      </div>

      <script>
        // Generate QR code for this user
        document.addEventListener('DOMContentLoaded', function() {
          new QRCode(document.getElementById("qrcode-{{ $user->id }}"), {
            text: "{{ $user->user_id }}",
            width: 100,
            height: 100,
            colorDark: "#1f2937",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
          });
        });
      </script>
      @endforeach
    </div>
  </div>

  <script>
    // Auto-print after 1 second (optional)
    window.onload = function() {
      setTimeout(function() {
        // Uncomment to enable auto-print
        // window.print();
      }, 1000);
    }
  </script>
</body>
</html>