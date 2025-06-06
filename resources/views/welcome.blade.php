<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sistem Pengelola Kehadiran SMKN 1 Kota Bengkulu">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          sans: ['Poppins', 'sans-serif'],
        },
        extend: {
          colors: {
            primary: {
              600: '#2563eb',
              700: '#1d4ed8',
              800: '#1e40af',
              900: '#1e3a8a',
            },
            secondary: {
              400: '#fbbf24',
            }
          },
          boxShadow: {
            'card': '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
            'card-hover': '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
          },
          animation: {
            'fade-in': 'fadeIn 0.3s ease-in-out',
            'slide-up': 'slideUp 0.3s ease-out'
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' }
            },
            slideUp: {
              '0%': { transform: 'translateY(20px)' },
              '100%': { transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Hadirin - Sistem Kehadiran SMKN 1 Kota Bengkulu</title>
  <style>
    @media (max-width: 640px) {
      .header-height {
        height: auto;
        min-height: 18rem;
      }
      
      .card-square {
        aspect-ratio: 1/1;
      }
      
      .card-rectangle {
        aspect-ratio: 2/1;
      }
    }
    
    /* Improved card styling */
    .card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      border: 1px solid rgba(229, 231, 235, 0.8);
    }
    
    .card:hover {
      transform: translateY(-4px);
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    
    /* Improved tab button styling */
    .tab-button {
      transition: all 0.2s ease;
    }
    
    .tab-button:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }
    
    .tab-button.active {
      background-color: rgba(255, 255, 255, 0.2);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    /* Improved decorative elements */
    .decorative-circle {
      filter: blur(40px);
      opacity: 0.15;
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen antialiased">

  <!-- Improved Header -->
  <header class="w-full header-height rounded-b-3xl bg-gradient-to-br from-primary-700 to-primary-900 px-6 py-8 md:px-8 md:py-10 relative overflow-hidden">
    <!-- Decorative elements - improved -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-10 left-20 w-32 h-32 rounded-full bg-white decorative-circle"></div>
      <div class="absolute bottom-10 right-20 w-24 h-24 rounded-full bg-secondary-400 decorative-circle"></div>
      <div class="absolute top-1/3 right-1/4 w-16 h-16 rounded-full bg-white decorative-circle"></div>
    </div>
    
    <div class="relative z-10 max-w-6xl mx-auto">
      <div class="flex justify-between items-start">
        <div class="text-white font-bold text-xl flex items-center">
          <i data-feather="clock" class="mr-2"></i>
          HADIRIN
        </div>
        <div class="flex space-x-2">
          <div class="w-4 h-4 bg-yellow-400 rounded-full animate-pulse" style="animation-delay: 0.1s"></div>
          <div class="w-4 h-4 bg-green-300 rounded-full animate-pulse" style="animation-delay: 0.3s"></div>
        </div>
      </div>

      <div class="text-white text-center mt-8 md:mt-10">
        <div class="mx-auto w-24 h-24 md:w-28 md:h-28 bg-white bg-opacity-10 rounded-full p-4 shadow-md">
          <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 1 Kota Bengkulu" class="w-full h-full object-contain" />
        </div>
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mt-4">SMKN 1 Kota Bengkulu</h1>
        <p class="text-lg md:text-xl text-blue-100 mt-2">Sistem Manajemen Kehadiran</p>
      </div>

      <nav class="flex justify-center mt-8 md:mt-10 space-x-2 md:space-x-4">
        <button id="b1" onclick="switchTab(1)" class="tab-button text-white font-medium px-4 py-2 rounded-lg transition-all duration-200 flex items-center">
          <i data-feather="tool" class="mr-2 w-5 h-5"></i> Tools
        </button>
        <button id="b2" onclick="switchTab(2)" class="tab-button text-white font-medium px-4 py-2 rounded-lg transition-all duration-200 flex items-center">
          <i data-feather="printer" class="mr-2 w-5 h-5"></i> Cetak
        </button>
        <button id="b3" onclick="switchTab(3)" class="tab-button text-white font-medium px-4 py-2 rounded-lg transition-all duration-200 flex items-center">
          <i data-feather="info" class="mr-2 w-5 h-5"></i> Informasi
        </button>
      </nav>
    </div>
  </header>

  <!-- Main Content - Improved -->
  <main class="px-4 py-8 md:px-8 md:py-12 max-w-6xl mx-auto transition-all duration-300">

    <!-- Tools Tab - Improved -->
    <div id="tab1" class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 transition-opacity duration-300">
      <!-- Card 1 - Improved -->
      <a href="/users" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/add-user-group-man-man.png" class="w-8 h-8" alt="Input Anggota" />
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Input Anggota</h3>
          <p class="text-xs text-gray-500 text-center">Tambah/edit data anggota</p>
        </div>
      </a>
      
      <!-- Card 2 - Improved -->
      <a href="/events" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/edit-calendar.png" class="w-8 h-8" alt="Input Kegiatan" />
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Input Kegiatan</h3>
          <p class="text-xs text-gray-500 text-center">Kelola jadwal kegiatan</p>
        </div>
      </a>
      
      <!-- Card 3 - Improved -->
      <a href="{{ route('generate.id.show') }}" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiMxZTQwYWYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBjbGFzcz0ibHVjaWRlIGx1Y2lkZS1pZC1jYXJkLWljb24gbHVjaWRlLWlkLWNhcmQiPjxwYXRoIGQ9Ik0xNiAxMGgyIi8+PHBhdGggZD0iTTE2IDE0aDIiLz48cGF0aCBkPSJNNi4xNyAxNWEzIDMgMCAwIDEgNS42NiAwIi8+PGNpcmNsZSBjeD0iOSIgY3k9IjExIiByPSIyIi8+PHJlY3QgeD0iMiIgeT0iNSIgd2lkdGg9IjIwIiBoZWlnaHQ9IjE0IiByeD0iMiIvPjwvc3ZnPg==" class="w-8 h-8" alt="Generate ID" />
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Generate ID</h3>
          <p class="text-xs text-gray-500 text-center">Buat kartu identitas</p>
        </div>
      </a>
      
      <!-- Card 4 - Improved -->
      <a href="{{ route('scan.show') }}" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <i data-feather="maximize" class="w-8 h-8 text-blue-800"></i>
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Scan Kehadiran</h3>
          <p class="text-xs text-gray-500 text-center">Scan QR code presensi</p>
        </div>
      </a>
    </div>

    <!-- Prints Tab - Improved -->
    <div id="tab2" class="hidden grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 transition-opacity duration-300">
      <!-- Rectangle Card 1 -->
      <a href="{{ route('cetak.kehadiran.harian') }}" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center justify-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <i data-feather="calendar" class="w-8 h-8 text-blue-800"></i>
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Cetak Kehadiran Harian</h3>
          <p class="text-xs text-gray-500 text-center">Laporan kehadiran harian</p>
        </div>
      </a>
      
      <!-- Rectangle Card 2 -->
      <a href="{{ route('cetak.kehadiran.bulanan') }}" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center justify-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <i data-feather="calendar" class="w-8 h-8 text-blue-800"></i>
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Cetak Kehadiran Bulanan</h3>
          <p class="text-xs text-gray-500 text-center">Laporan kehadiran bulanan</p>
        </div>
      </a>
      
      <!-- Rectangle Card 3 -->
      <a href="{{ route('print.all.id') }}" class="card bg-white rounded-xl shadow-md hover:shadow-lg transition-all duration-200 group overflow-hidden border border-gray-100 animate-fade-in animate-slide-up">
        <div class="h-full p-6 flex flex-col items-center justify-center">
          <div class="w-14 h-14 rounded-full bg-blue-50 mb-4 flex items-center justify-center group-hover:bg-blue-100 transition-colors duration-200">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/print.png" class="w-8 h-8" alt="Print ID" />
          </div>
          <h3 class="text-base font-semibold text-gray-800 mb-1 text-center">Cetak Semua ID</h3>
          <p class="text-xs text-gray-500 text-center">Cetak semua kartu identitas</p>
        </div>
      </a>
    </div>

    <!-- Info Tab - Improved -->
    <div id="tab3" class="hidden transition-opacity duration-300 animate-fade-in">
      <div class="bg-white rounded-xl shadow-lg p-6 md:p-8">
        <div class="flex items-center mb-6">
          <div class="w-12 h-12 rounded-full bg-blue-50 flex items-center justify-center mr-4">
            <i data-feather="info" class="w-6 h-6 text-blue-800"></i>
          </div>
          <h2 class="text-2xl font-bold text-gray-800">Tentang Hadirin</h2>
        </div>
        
        <div class="space-y-4">
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-3 h-3 rounded-full bg-blue-800"></div>
            </div>
            <p class="ml-4 text-gray-700">
              <span class="font-semibold text-blue-800">Hadirin</span> merupakan sistem pengelola kehadiran digital untuk lingkungan sekolah yang dirancang dengan antarmuka modern dan intuitif.
            </p>
          </div>
          
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-3 h-3 rounded-full bg-blue-800"></div>
            </div>
            <p class="ml-4 text-gray-700">
              Sistem ini memungkinkan pencatatan kehadiran yang efisien dengan fitur QR code scanning, manajemen anggota, dan pelaporan otomatis.
            </p>
          </div>
          
          <div class="flex items-start">
            <div class="flex-shrink-0 mt-1">
              <div class="w-3 h-3 rounded-full bg-blue-800"></div>
            </div>
            <p class="ml-4 text-gray-700">
              Dikembangkan oleh tim Guru Produktif Jurusan PPLG SMKN 1 Kota Bengkulu sebagai solusi digital untuk manajemen kehadiran yang lebih baik.
            </p>
          </div>
          
          <div class="pt-4 mt-4 border-t border-gray-100">
            <div class="flex items-center text-sm text-gray-500">
              <i data-feather="code" class="w-4 h-4 mr-2"></i>
              <span>Versi 1.0.0 - © 2023 SMKN 1 Kota Bengkulu</span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    function switchTab(id) {
      // Hide all tabs
      for (let i = 1; i <= 3; i++) {
        document.getElementById('tab' + i).classList.add('hidden');
        document.getElementById('b' + i).classList.remove('active');
      }
      
      // Show selected tab
      document.getElementById('tab' + id).classList.remove('hidden');
      document.getElementById('b' + i).classList.add('active');
      
      // Store selected tab in sessionStorage
      sessionStorage.setItem('selectedTab', id);
    }

    // Initialize feather icons
    feather.replace();
    
    // Set initial tab from sessionStorage or default to 1
    document.addEventListener('DOMContentLoaded', () => {
      const selectedTab = sessionStorage.getItem('selectedTab') || 1;
      switchTab(selectedTab);
      
      // Add animation delay to cards
      const cards = document.querySelectorAll('[id^="tab"] a');
      cards.forEach((card, index) => {
        card.style.animationDelay = `${index * 50}ms`;
      });
    });
  </script>
</body>
</html>