@php
    $navTextColor = $navTextColor ?? 'text-white';
@endphp
<nav class="flex gap-6 mb-6 md:mb-0">
    <a href="#accueil" class="font-body text-base {{ $navTextColor }} hover:text-wood-light transition">Accueil</a>
    <a href="#evenements" class="font-body text-base {{ $navTextColor }} hover:text-wood-light transition">Événements</a>
    <a href="#licences" class="font-body text-base {{ $navTextColor }} hover:text-wood-light transition">Licences</a>
    <a href="#contact" class="font-body text-base {{ $navTextColor }} hover:text-wood-light transition">Contact</a>
</nav>
