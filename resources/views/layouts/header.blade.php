<header class="bg-wood-dark text-black py-4 px-[15px] sm:px-6 md:px-10 shadow-md" x-data="{ open: false }">
  <div class="container mx-auto flex items-center justify-between gap-2 px-[15px] sm:px-4 md:px-8">
    <div class="flex flex-row items-center gap-4 sm:gap-10 md:gap-20 min-w-0">
      @include('layouts.logo', ['logoTextColor' => 'text-black'])
      <template x-if="open || window.innerWidth > 700">
        <div class="md:flex">
          @include('layouts.nav', ['navTextColor' => 'text-black'])
        </div>
      </template>
    </div>
    <span class="hidden md:inline-block">
      @include('layouts.cta-button')
    </span>

    <!-- Bouton burger -->
    <button @click="open = !open" class="md:hidden focus:outline-none z-99" aria-label="Toggle menu">
      <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
      </svg>
    </button>
  </div>

  <!-- Menu mobile dropdown -->
  <template x-if="open || innerWidth > 700">
    <div @click.away="open = false" x-transition:enter="transition ease-out duration-200"
      x-transition:enter-start="opacity-0 -translate-y-2" x-transition:enter-end="opacity-100 translate-y-0"
      x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100 translate-y-0"
      x-transition:leave-end="opacity-0 -translate-y-2"
      class="fixed inset-0 bg-wood-dark border-t border-gray-300 shadow-lg md:hidden z-50 flex flex-col justify-center items-center">

      <nav
        class="container mx-auto px-[15px] sm:px-4 py-4 bg-gray-50 h-full w-full flex justify-center items-center flex-col">
        <div class="flex flex-col gap-4">
          @include('layouts.nav', ['navTextColor' => 'text-black'])
        </div>
        <div class="mt-4 pt-4 border-t border-gray-300">
          @include('layouts.cta-button')
        </div>
      </nav>
    </div>
  </template>
</header>