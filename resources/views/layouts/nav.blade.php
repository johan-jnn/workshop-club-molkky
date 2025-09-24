@php
    $navTextColor = $navTextColor ?? 'text-white';
@endphp
<style>
    .nav-underline {
        position: relative;
        transition: color 0.2s;
    }
    .nav-underline::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 0;
        height: 2px;
        background: #000000;
        transition: width 0.3s cubic-bezier(.4,0,.2,1);
    }
    .nav-underline:hover::after {
        width: 100%;
    }
</style>
<nav class="flex gap-6 mb-6 md:mb-0">
        <a href="/" class="font-body text-base font-bold {{ $navTextColor }} nav-underline hover:text-wood-light">Accueil</a>
        <a href="/about" class="font-body text-base font-bold {{ $navTextColor }} nav-underline hover:text-wood-light">À propos</a>
        {{-- <a href="/events" class="font-body text-base font-bold {{ $navTextColor }} nav-underline hover:text-wood-light">Événements</a> --}}
        <a href="/contact" class="font-body text-base font-bold {{ $navTextColor }} nav-underline hover:text-wood-light">Contact</a>
        <a href="/admin" class="font-body text-base font-bold {{ $navTextColor }} nav-underline hover:text-wood-light">Dashboard</a>
</nav>