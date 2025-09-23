<header class="bg-wood-dark text-black py-4 px-15 shadow-md">
    <div class="container mx-auto flex items-center justify-between px-8">
        <div class="flex flex-row items-center gap-20">
			@include('layouts.logo', ['logoTextColor' => 'text-black'])

			<div class="hidden md:flex">
				@include('layouts.nav', ['navTextColor' => 'text-black'])
			</div>
        </div>


		<span class="hidden md:inline-block">
			@include('layouts.cta-button')
		</span>

		<button class="md:hidden text-3xl" aria-label="Ouvrir le menu">
			&#9776;
		</button>
	</div>
</header>
<header>

</header>