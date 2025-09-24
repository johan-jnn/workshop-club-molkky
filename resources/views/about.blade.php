
@extends('layout')

@php
  $heroTitle = $heroTitle ?? 'Découvrez l\'histoire de notre club !';
  $heroDesc = $heroDesc ?? "Apprenez en plus sur l'histoire, les valeurs et l'équipe passionnée qui fait vivre notre club de Mölkky. Ce club est bien plus qu'un simple lieu de jeu ; c'est une communauté où chaque membre contribue à créer une atmosphère chaleureuse et accueillante.";
  $section2Title = $section2Title ?? "Notre histoire";
  $section2Items = $section2Items ?? [
    [
      'img' => '/images/about-first.jpg',
      'title' => '1981',
      'desc' => "Lancement du club de Mölkky CRHOM par un groupe d'amis passionnés de ce jeu finlandais. Fils d'une tradition de jeux en plein air, ils ont voulu partager cette passion avec la communauté locale."
    ],
    [
      'img' => '/images/about-third.jpg',
      'title' => '1985',
      'desc' => "Premières compétitions locales et régionales organisées par le club. Ainsi, le club a rapidement gagné en notoriété et a attiré de nombreux nouveaux membres. Cela a marqué le début d'une aventure passionnante pour tous les amateurs de Mölkky."
    ],
    [
      'img' => '/images/about-second.jpg',
      'title' => '2003',
      'desc' => "Mise en place d'une équipe dédiée à l'organisation des événements. C'est grâce à leur dévouement que le club a pu offrir des expériences mémorables à ses membres et continuer à grandir au fil des années."
    ],
  ];
  $section3Title = $section3Title ?? "Nos valeurs";
  $section3Items = $section3Items ?? [
    [ 'title' => 'Convivialité', 'desc' => "Le plaisir de jouer ensemble. Ce club est un lieu de rencontre et d'échange." ],
    [ 'title' => 'Respect', 'desc' => "Le respect des règles et des personnes. Afin de garantir une expérience de jeu agréable pour tous." ],
    [ 'title' => 'Esprit d’équipe', 'desc' => "L’entraide et la solidarité. Car ensemble, nous sommes plus forts." ],
  ];
  $section4Title = $section4Title ?? "Notre bureau";
  $section4Desc = $section4Desc ?? "C'est à eux que nous devons la bonne organisation du club et de ses événements.";
  $section4Items = $section4Items ?? [
    [ 'img' => '/images/office-1.jpg', 'title' => 'Directeur' ],
    [ 'img' => '/images/office-2.jpg', 'title' => 'Trésorière' ],
    [ 'img' => '/images/office-3.jpg', 'title' => 'Professeur' ],
    [ 'img' => '/images/office-4.jpg', 'title' => 'Professeur' ],
    [ 'img' => '/images/office-5.jpg', 'title' => 'Encadrant' ],
    [ 'img' => '/images/office-6.jpg', 'title' => 'Encadrant' ],
  ];
@endphp

@section('head')
  <title>{{ $heroTitle }} - Club de Mölkky</title>
  <meta name="description" content="{{ $heroDesc }}">
@endsection

@section('content')
<!-- Hero Section -->
<section class="w-full py-16 bg-[#333333] px-30">
  <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
    <div class="flex-1 flex flex-col items-start justify-center gap-6">
  <h1 class="text-3xl md:text-4xl font-bold mb-2 font-heading text-white">Découvrez l'historie de notre club de Molkky légendaire !</h1>
  <p class="text-base md:text-lg text-gray-100 mb-4 font-body" style="font-size: 15px;">{{ $heroDesc }}</p>
      @include('layouts.cta-button')
    </div>
    <div class="flex-1 flex justify-center">
  <img src="/images/about-hero.jpg" alt="À propos Hero" class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
    </div>
  </div>
</section>

<!-- Section équipe -->
<section class="w-full py-16 px-30">
  <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center font-heading text-black">{{ $section2Title }}</h2>
  <div class="container mx-auto flex flex-col gap-12 px-8">
    @foreach ($section2Items as $i => $item)
      <div class="flex flex-col md:flex-row {{ $i == 1 ? 'md:flex-row-reverse' : '' }} items-center gap-20">
        <div class="flex-1 flex justify-center">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105" style="width: 800px; height: 250px; object-fit: cover;">
        </div>
        <div class="flex-1 flex flex-col items-start justify-center gap-2">
          <h2 class="text-2xl md:text-3xl font-bold mb-2 font-heading text-black">{{ $item['title'] }}</h2>
          <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 15px;">{{ $item['desc'] }}</p>
        </div>
      </div>
    @endforeach
  </div>
</section>

<hr class="border-wood-light w-3/4 mx-auto" />

<!-- Section valeurs -->
<section class="w-full py-16 px-30">
  <h2 class="text-3xl md:text-4xl font-bold mb-10 text-center font-heading text-black">{{ $section3Title }}</h2>
  <div class="container mx-auto flex flex-row gap-8 px-8 justify-center">
    @foreach ($section3Items as $item)
      <div class="flex-1 flex flex-col items-center bg-white rounded-lg shadow-md p-6">
  <h3 class="text-xl font-bold mb-2 text-center font-heading text-black">{{ $item['title'] }}</h3>
  <p class="text-base md:text-lg text-gray-700 text-center font-body" style="font-size: 15px;">{{ $item['desc'] }}</p>
      </div>
    @endforeach
  </div>
</section>

<!-- Dernière section partenaires -->
<section class="w-full py-16 bg-[#333333] px-30"  style="border-bottom: 2px solid #fff;">
  <div class="container mx-auto px-8">
  <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center font-heading text-white">{{ $section4Title }}</h2>
  <p class="text-base md:text-lg text-gray-100 mb-10 text-center font-body" style="font-size: 15px;">{{ $section4Desc }}</p>
    <div class="flex flex-row gap-8 justify-center items-center">
      @foreach ($section4Items as $item)
        <div class="flex flex-col items-center gap-2">
          <img src="{{ $item['img'] }}" alt="{{ $item['title'] }}" class="w-30 h-30 rounded-full object-cover mb-2">
          <h4 class="text-xl font-bold text-center font-heading text-white">{{ $item['title'] }}</h4>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
