<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="/images/color-logo.png">

  <title>NPR Week 2025</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
  <script>
    // Toggle mobile menu
    function toggleMenu() {
      const menu = document.getElementById("mobile-menu");
      menu.classList.toggle("hidden");
    }
  </script>
</head>
<body class="font-sans antialiased">

  <!-- Header / Navigation -->
  <header class="bg-gray-800 text-white">
    <div class="container mx-auto flex items-center justify-between py-8 px-6">
      <a href="/"><img src="/images/logo_white.png" alt="logo" style="width:150px"></a>

      <!-- Desktop Navigation Links -->
      <nav class="hidden md:flex space-x-6">
        <a href="#" class="text-lg hover:text-red-500">About</a>
        <a href="#" class="text-lg hover:text-red-500">Contact</a>
      </nav>

      <!-- Hamburger Icon for Mobile -->
      <div class="md:hidden flex items-center" onclick="toggleMenu()">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M3 12h18M3 6h18M3 18h18"></path>
        </svg>
      </div>
    </div>
  </header>

  <!-- Mobile Menu (hidden by default) -->
  <div id="mobile-menu" class="md:hidden hidden bg-gray-800 text-white px-6 py-4 space-y-6">
    <a href="#" class="text-lg block hover:text-red-500">About</a>
    <a href="#" class="text-lg block hover:text-red-500">Contact</a>
  </div>