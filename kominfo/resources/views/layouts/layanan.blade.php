<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Layanan Publik — Diskominfo Kota Bogor')</title>
  <meta name="description" content="@yield('description', 'Dinas Komunikasi dan Informatika Kota Bogor — Portal layanan digital, informasi publik, dan pengaduan masyarakat.')">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('layanan-publik/css/style.css') }}">
  
  @yield('styles')
</head>
<body>

  <!-- ═══════════ NAVBAR ═══════════ -->
  @include('layouts.partials.navbar')

  <!-- ═══════════ MAIN CONTENT ═══════════ -->
  @yield('content')

  <!-- ═══════════ FOOTER ═══════════ -->
  @include('layouts.partials.footer')

  <!-- ═══════════ SCRIPTS ═══════════ -->
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Force scroll to top on refresh if defined on page
    @yield('scroll_to_top_script')

    // Initialize AOS animations
    AOS.init({ once: true, duration: 800, offset: 100, easing: 'ease-out-quart' });

    // Set current year in footer
    const yearEl = document.getElementById('year');
    if (yearEl) {
      yearEl.textContent = new Date().getFullYear();
    }

    // Mobile Navbar Toggle
    const navbarToggler = document.getElementById('navbarToggler');
    const navbarMenu = document.getElementById('navbarMenu');
    if (navbarToggler && navbarMenu) {
      navbarToggler.addEventListener('click', () => {
        navbarMenu.classList.toggle('open');
      });
    }

    // Toggle dropdowns on click (mimicking Bootstrap)
    document.querySelectorAll('.nav-item.dropdown').forEach(dropdown => {
      const toggle = dropdown.querySelector('.nav-link');
      const menu = dropdown.querySelector('.dropdown-menu');
      
      if (toggle && menu) {
        toggle.addEventListener('click', (e) => {
          e.preventDefault();
          e.stopPropagation();
          
          const isOpen = menu.classList.contains('show');
          
          // Close all other dropdowns
          document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('show'));
          document.querySelectorAll('.nav-item.dropdown').forEach(d => d.classList.remove('open'));
          
          if (!isOpen) {
            menu.classList.add('show');
            dropdown.classList.add('open');
          }
        });
      }
    });

    // Close dropdowns when clicking outside
    document.addEventListener('click', () => {
      document.querySelectorAll('.dropdown-menu').forEach(m => m.classList.remove('show'));
      document.querySelectorAll('.nav-item.dropdown').forEach(d => d.classList.remove('open'));
    });
  </script>
  @yield('scripts')
</body>
</html>
