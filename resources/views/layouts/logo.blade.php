@php
    $logoTextColor = $logoTextColor ?? 'text-white';
@endphp
<a href="/" class="flex items-center gap-2">
    <img src="/images/logo.jpg" alt="Club de Mölkky" class="h-20 w-auto">
    <span class="font-heading text-xl font-bold {{ $logoTextColor }}">Club de Mölkky</span>
</a>
