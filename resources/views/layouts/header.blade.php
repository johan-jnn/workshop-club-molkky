

<header class="bg-wood-dark text-black py-4 px-[15px] sm:px-6 md:px-10 shadow-md" x-data="{ open: false }">
    <div class="container mx-auto flex items-center justify-between px-[15px] sm:px-4 md:px-8">
        <div class="flex flex-row items-center gap-4 sm:gap-10 md:gap-20 min-w-0">
            @include('layouts.logo', ['logoTextColor' => 'text-black'])
            <div class="hidden md:flex">
                @include('layouts.nav', ['navTextColor' => 'text-black'])
            </div>
        </div>
        <span class="hidden md:inline-block">
            @include('layouts.cta-button')
        </span>
        <button class="md:hidden text-3xl focus:outline-none" aria-label="Ouvrir le menu" x-on:click="open = true">
            &#9776;
        </button>
    </div>

	<!-- Overlay menu mobile -->
	<div x-show="open" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100" x-transition:leave="transition ease-in duration-150" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" class="fixed inset-0 z-50 flex flex-col bg-wood-dark text-black items-center justify-center md:hidden px-4" style="display: none;">
		<button class="absolute top-4 right-4 text-4xl focus:outline-none" aria-label="Fermer le menu" x-on:click="open = false">&times;</button>
		<div class="mb-8 w-full flex justify-center">
			@include('layouts.logo', ['logoTextColor' => 'text-black'])
		</div>
		<nav class="flex flex-col gap-6 items-center text-xl w-full">
			@include('layouts.nav', ['navTextColor' => 'text-black'])
		</nav>
		<div class="mt-8 w-full flex justify-center">
			@include('layouts.cta-button')
		</div>
	</div>
</header>