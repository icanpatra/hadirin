<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sistem Pengelola Kehadiran Digital Sekolah">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          sans: ['Nunito', 'sans-serif'],
        },
        extend: {
          colors: {
            primary: {
              500: '#CA7842',
              600: '#B86A3A',
              700: '#A65C32',
            },
            secondary: {
              500: '#6B7280',
              600: '#4B5563',
            },
            accent: {
              500: '#EAB308',
              600: '#CA8A04',
            }
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
  <title>AbsensiKu - Sistem Kehadiran Sekolah</title>
  <style>
    .card {
      transition: all 0.3s ease;
      background: linear-gradient(135deg, rgba(255,255,255,0.95) 0%, rgba(255,255,255,0.98) 100%);
    }
    
    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.15);
    }
    
    .nav-pill {
      transition: all 0.3s ease;
      border: 1px solid rgba(255, 255, 255, 0.2);
    }
    
    .nav-pill.active {
      background: rgba(255, 255, 255, 0.25);
      box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
    }
    
    .nav-pill:hover:not(.active) {
      background: rgba(255, 255, 255, 0.15);
    }
    
    .header-gradient {
      background: linear-gradient(135deg, #CA7842 0%, #EAB308 100%);
    }
    
    .blob {
      filter: blur(40px);
      opacity: 0.15;
    }
    
    @keyframes float {
      0% { transform: translateY(0px); }
      50% { transform: translateY(-10px); }
      100% { transform: translateY(0px); }
    }
    
    .floating {
      animation: float 6s ease-in-out infinite;
    }
    
    .card-icon {
      background: linear-gradient(135deg, rgba(202, 120, 66, 0.1) 0%, rgba(234, 179, 8, 0.1) 100%);
    }
    
    .card-icon:hover {
      background: linear-gradient(135deg, rgba(202, 120, 66, 0.2) 0%, rgba(234, 179, 8, 0.2) 100%);
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 min-h-screen antialiased">

  <!-- Header -->
  <header class="w-full header-gradient px-6 py-8 md:px-8 md:py-10 relative overflow-hidden">
    <!-- Decorative blobs -->
    <div class="absolute top-0 left-0 w-full h-full overflow-hidden">
      <div class="absolute top-20 left-20 w-40 h-40 rounded-full bg-white blob"></div>
      <div class="absolute bottom-20 right-20 w-32 h-32 rounded-full bg-accent-500 blob"></div>
      <div class="absolute top-1/3 right-1/4 w-24 h-24 rounded-full bg-white blob"></div>
    </div>
    
    <div class="relative z-10 max-w-6xl mx-auto">
      <div class="flex justify-between items-center">
        <div class="text-white font-bold text-xl flex items-center">
          <span class="bg-clip-text text-transparent bg-gradient-to-r from-white to-amber-100">HADIRIN</span>
        </div>
        <div class="flex items-center space-x-2">
          <div class="w-4 h-4 bg-blue-400 rounded-full animate-pulse" style="animation-delay: 0.1s"></div>
          <div class="w-4 h-4 bg-green-300 rounded-full animate-pulse" style="animation-delay: 0.3s"></div>
        </div>
      </div>

      <div class="text-white text-center mt-12 md:mt-14">
        <div class="mx-auto w-24 h-24 md:w-28 md:h-28 bg-white bg-opacity-20 rounded-2xl p-4 shadow-lg floating">
          <img src="{{ asset('images/logo.png') }}" alt="Logo Sekolah" class="w-full h-full object-contain" />
        </div>
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mt-6 bg-clip-text text-transparent bg-gradient-to-r from-white to-amber-100">SMKN 1 Kota Bengkulu</h1>
      </div>

      <nav class="flex justify-center mt-10 md:mt-12 space-x-2 md:space-x-3">
        <button onclick="switchTab(1)" class="nav-pill text-white font-medium px-5 py-2.5 rounded-full flex items-center">
          <i data-feather="tool" class="mr-2 w-4 h-4"></i> Tools
        </button>
        <button onclick="switchTab(2)" class="nav-pill text-white font-medium px-5 py-2.5 rounded-full flex items-center">
          <i data-feather="file-text" class="mr-2 w-4 h-4"></i> Prints
        </button>
        <button onclick="switchTab(3)" class="nav-pill text-white font-medium px-5 py-2.5 rounded-full flex items-center">
          <i data-feather="info" class="mr-2 w-4 h-4"></i> Infos
        </button>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="px-4 py-8 md:px-8 md:py-12 max-w-6xl mx-auto -mt-6">

    <!-- Main Menu Tab -->
    <div id="tab1" class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-6">
      <!-- Card 1 -->
      <a href="/users" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-5 flex flex-col items-center text-center">
          <div class="w-14 h-14 rounded-2xl card-icon mb-4 flex items-center justify-center transition-colors">
            <i data-feather="users" class="w-6 h-6 text-primary-600"></i>
          </div>
          <h3 class="font-semibold text-gray-800 mb-1">Input Anggota</h3>
        </div>
      </a>
      
      <!-- Card 2 -->
      <a href="/events" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-5 flex flex-col items-center text-center">
          <div class="w-14 h-14 rounded-2xl card-icon mb-4 flex items-center justify-center transition-colors">
            <i data-feather="calendar" class="w-6 h-6 text-primary-600"></i>
          </div>
          <h3 class="font-semibold text-gray-800 mb-1">Input kegiatan</h3>
        </div>
      </a>
      
      <!-- Card 3 -->
      <a href="{{ route('generate.id.show') }}" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-5 flex flex-col items-center text-center">
          <div class="w-14 h-14 rounded-2xl card-icon mb-4 flex items-center justify-center transition-colors">
            <i data-feather="credit-card" class="w-6 h-6 text-primary-600"></i>
          </div>
          <h3 class="font-semibold text-gray-800 mb-1">Generate ID Anggota</h3>
        </div>
      </a>
      
      <!-- Card 4 -->
      <a href="{{ route('scan.show') }}" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-5 flex flex-col items-center text-center">
          <div class="w-14 h-14 rounded-2xl card-icon mb-4 flex items-center justify-center transition-colors">
            <i data-feather="maximize" class="w-6 h-6 text-primary-600"></i>
          </div>
          <h3 class="font-semibold text-gray-800 mb-1">Scan Kehadiran</h3>
        </div>
      </a>
    </div>

    <!-- Reports Tab -->
    <div id="tab2" class="hidden grid grid-cols-1 md:grid-cols-2 gap-6">
      <!-- Report Card 1 -->
      <a href="{{ route('cetak.kehadiran.harian') }}" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-6 flex items-start">
          <div class="w-12 h-12 rounded-xl bg-amber-50 mr-4 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
            <i data-feather="calendar" class="w-5 h-5 text-amber-600"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">Print kehadiran Harian</h3>
          </div>
        </div>
      </a>
      
      <!-- Report Card 2 -->
      <a href="{{ route('cetak.kehadiran.bulanan') }}" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-6 flex items-start">
          <div class="w-12 h-12 rounded-xl bg-amber-50 mr-4 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
            <i data-feather="calendar" class="w-5 h-5 text-amber-600"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">Print Kehadiran Bulanan</h3>
          </div>
        </div>
      </a>
      
      <!-- Report Card 3 -->
      <a href="{{ route('print.all.id') }}" class="card rounded-xl shadow-md border border-gray-200 overflow-hidden group">
        <div class="p-6 flex items-start">
          <div class="w-12 h-12 rounded-xl bg-amber-50 mr-4 flex items-center justify-center group-hover:bg-amber-100 transition-colors">
            <i data-feather="credit-card" class="w-5 h-5 text-amber-600"></i>
          </div>
          <div>
            <h3 class="font-semibold text-gray-800 mb-1">Print Seluruh ID Anggota</h3>
            <p class="text-sm text-gray-500">Generate dan cetak semua kartu identitas</p>
          </div>
        </div>
      </a>
    </div>

    <!-- About Tab -->
    <div id="tab3" class="hidden">
      <div class="card rounded-xl shadow-md overflow-hidden border border-gray-200">
        <div class="p-6 md:p-8">
        <p class="font-bold">Hadirin merupakan sebuah sistem pengelola kehadiran dalam lingkungan sekolah.</p>
        <br>
        <p> Dengan desain minimalis dani sederhana, Hadirin mampu. mengakomodasi kebutuhan pencatatan kehadiran masyarakat sekolah dalam berbagai situasi.</p>
        <br>
        <p>          
          Pengembangan sistem ini didukung sepenuhnya secara swadaya, sebagai produk Hibah dari Guru Produktif Jurusan PPLG SMKN 1 Kota Bengkulu.</p>
        </div>
      </div>
    </div>
  </main>

  <script>
    // Tab switching functionality
    function switchTab(tabNumber) {
      // Hide all tabs
      document.querySelectorAll('[id^="tab"]').forEach(tab => {
        tab.classList.add('hidden');
      });
      
      // Show selected tab
      document.getElementById(`tab${tabNumber}`).classList.remove('hidden');
      
      // Update active nav button
      document.querySelectorAll('nav button').forEach((btn, index) => {
        if (index === tabNumber - 1) {
          btn.classList.add('active');
          btn.classList.remove('border-transparent');
        } else {
          btn.classList.remove('active');
          btn.classList.add('border-transparent');
        }
      });
      
      // Store selected tab
      localStorage.setItem('selectedTab', tabNumber);
    }

    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize feather icons
      feather.replace();
      
      // Set initial tab from localStorage or default to 1
      const selectedTab = localStorage.getItem('selectedTab') || 1;
      switchTab(selectedTab);
    });
  </script>
</body>
</html>