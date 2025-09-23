
<footer class="bg-[#333333] text-white py-8 px-15 w-full mt-auto">
	<div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8 px-8">
		<div class="flex items-center gap-2 mb-6 md:mb-0">
			@include('layouts.logo')
		</div>

		<div class="flex mb-6 md:mb-0">
			@include('layouts.nav')
		</div>

		<div class="hidden md:block h-16 border-l border-wood-light mx-4"></div>

		<div class="flex flex-col items-center gap-2 mb-6 md:mb-0">
			<div class="flex gap-16">
				<a href="#mentions" class="hover:text-wood-light transition text-white underline font-body">Mentions légales</a>
				<a href="#rgpd" class="hover:text-wood-light transition text-white underline font-body">RGPD</a>
			</div>
		</div>

		@include('layouts.social-media')
	</div>
</footer>
