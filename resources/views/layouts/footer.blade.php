@use(App\Models\Setting)

<footer class="bg-[#333333] text-white py-8 px-15 w-full mt-auto">
	<div class="container mx-auto flex flex-col md:flex-row items-center justify-between gap-8 px-8">
		<div class="flex items-center gap-2 mb-6 md:mb-0">
			@include('layouts.logo')
		</div>

		<style>
			.nav-underline-footer {
				position: relative;
				transition: color 0.2s;
			}
			.nav-underline-footer::after {
				content: '';
				position: absolute;
				left: 0;
				bottom: -2px;
				width: 0;
				height: 2px;
				background: #fff;
				transition: width 0.3s cubic-bezier(.4,0,.2,1);
			}
			.nav-underline-footer:hover::after {
				width: 100%;
			}
		</style>
		<div class="flex mb-6 md:mb-0">
				<nav class="flex gap-6 mb-6 md:mb-0">
						<a href="/" class="font-body text-base font-bold text-white nav-underline-footer hover:text-wood-light">Accueil</a>
						<a href="/about" class="font-body text-base font-bold text-white nav-underline-footer hover:text-wood-light">À propos</a>
						<a href="/events" class="font-body text-base font-bold text-white nav-underline-footer hover:text-wood-light">Événements</a>
						<a href="/contact" class="font-body text-base font-bold text-white nav-underline-footer hover:text-wood-light">Contact</a>
				</nav>
		</div>

		<div class="hidden md:block h-16 border-l border-wood-light mx-4"></div>

		<div class="flex flex-col items-center gap-2 mb-6 md:mb-0">
			<div class="flex gap-16">
				<a href="{{ Setting::where('key', 'mentions_legals_link')->first()->value }}" target="_blank" rel=" noopener norefere"" class="hover:text-wood-light transition text-white underline font-body">Mentions légales</a>
				<a href="{{ Setting::where('key', 'rgpd_link')->first()->value }}" target="_blank" rel=" noopener norefere"" class="hover:text-wood-light transition text-white underline font-body">RGPD</a>
			</div>
		</div>

		@include('layouts.social-media')
	</div>
</footer>
