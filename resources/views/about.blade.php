@extends('layout')
@use(App\Models\Aboutpage)

@php
  function getImageUrl($imagePath, $defaultPath = null)
  {
    if (empty($imagePath)) {
      return $defaultPath;
    }
    if (str_starts_with($imagePath, '/')) {
      return $imagePath;
    }
    return Storage::url($imagePath);
  }

  $heroTitle = Aboutpage::find('hero_title')->value ?? 'Découvrez l\'histoire de notre club !';
  $heroDesc = Aboutpage::find('hero_description')->value ?? "Apprenez en plus sur l'histoire, les valeurs et l'équipe passionnée qui fait vivre notre club de Mölkky. Ce club est bien plus qu'un simple lieu de jeu ; c'est une communauté où chaque membre contribue à créer une atmosphère chaleureuse et accueillante.";
  $heroImage = Aboutpage::find('hero_image')->value ?? '/images/about-hero.jpg';

  $storiesTitle = Aboutpage::find('stories_title')->value ?? 'Notre histoire';
  $storiesData = Aboutpage::find('stories')->value ?? '[]';
  $stories = json_decode($storiesData, true) ?? [];

  if (empty($stories)) {
    $stories = [
      [
        'image' => '/images/about-first.jpg',
        'title' => '1981',
        'description' => "Lancement du club de Mölkky CRHOM par un groupe d'amis passionnés de ce jeu finlandais. Fils d'une tradition de jeux en plein air, ils ont voulu partager cette passion avec la communauté locale."
      ],
      [
        'image' => '/images/about-third.jpg',
        'title' => '1985',
        'description' => "Premières compétitions locales et régionales organisées par le club. Ainsi, le club a rapidement gagné en notoriété et a attiré de nombreux nouveaux membres. Cela a marqué le début d'une aventure passionnante pour tous les amateurs de Mölkky."
      ],
      [
        'image' => '/images/about-second.jpg',
        'title' => '2003',
        'description' => "Mise en place d'une équipe dédiée à l'organisation des événements. C'est grâce à leur dévouement que le club a pu offrir des expériences mémorables à ses membres et continuer à grandir au fil des années."
      ],
    ];
  }

  $valuesTitle = Aboutpage::find('values_title')->value ?? 'Nos valeurs';
  $valuesData = Aboutpage::find('values')->value ?? '[]';
  $values = json_decode($valuesData, true) ?? [];

  if (empty($values)) {
    $values = [
      ['title' => 'Convivialité', 'description' => "Le plaisir de jouer ensemble. Ce club est un lieu de rencontre et d'échange."],
      ['title' => 'Respect', 'description' => "Le respect des règles et des personnes. Afin de garantir une expérience de jeu agréable pour tous."],
      ['title' => 'Esprit d’équipe', 'description' => "L’entraide et la solidarité. Car ensemble, nous sommes plus forts."],
    ];
  }

  $membersTitle = Aboutpage::find('members_title')->value ?? 'Notre bureau';
  $membersDesc = Aboutpage::find('members_title')->value ?? 'C\'est à eux que nous devons la bonne organisation du club et de ses événements.';
  $membersData = Aboutpage::find('members')->value ?? '[]';
  $members = json_decode($membersData, true) ?? [];

  if (empty($members)) {
    $members = [
      ['image' => '/images/office-1.jpg', 'title' => 'Directeur'],
      ['image' => '/images/office-2.jpg', 'title' => 'Trésorière'],
      ['image' => '/images/office-3.jpg', 'title' => 'Professeur'],
      ['image' => '/images/office-4.jpg', 'title' => 'Professeur'],
      ['image' => '/images/office-5.jpg', 'title' => 'Encadrant'],
      ['image' => '/images/office-6.jpg', 'title' => 'Encadrant'],
    ];
  }
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
        <h1 class="text-3xl md:text-4xl font-bold mb-2 font-heading text-white">{{ $heroTitle }}</h1>
        <p class="text-base md:text-lg text-gray-100 mb-4 font-body" style="font-size: 15px;">{{ $heroDesc }}</p>
        @include('layouts.cta-button')
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ getImageUrl($heroImage) }}" alt="{{ $heroTitle }}" alt="À propos Hero"
          class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
      </div>
    </div>
  </section>

  <!-- Section équipe -->
  <section class="w-full py-16 px-30">
    <h2 class="text-3xl md:text-4xl font-bold mb-16 text-center font-heading text-black">{{ $storiesTitle }}</h2>
    <div class="container mx-auto flex flex-col gap-12 px-8">
      @foreach ($stories as $i => $story)
        <div class="flex flex-col md:flex-row {{ $i == 1 ? 'md:flex-row-reverse' : '' }} items-center gap-20">
          <div class="flex-1 flex justify-center">
            <img src="{{ getImageUrl($story['image']) }}" alt="{{ $story['title'] }}"
              class="rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105"
              style="width: 800px; height: 250px; object-fit: cover;">
          </div>
          <div class="flex-1 flex flex-col items-start justify-center gap-2">
            <h2 class="text-2xl md:text-3xl font-bold mb-2 font-heading text-black">{{ $story['title'] }}</h2>
            <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 15px;">
              {{ $story['description'] }}
            </p>
          </div>
        </div>
      @endforeach
    </div>
  </section>

  <hr class="border-wood-light w-3/4 mx-auto" />

  <!-- Section valeurs -->
  <section class="w-full py-16 px-30">
    <h2 class="text-3xl md:text-4xl font-bold mb-10 text-center font-heading text-black">{{ $valuesTitle }}</h2>
    <div class="container mx-auto flex flex-row gap-8 px-8 justify-center">
      @foreach ($values as $value)
        <div class="flex-1 flex flex-col items-center bg-white rounded-lg shadow-md p-6">
          <h3 class="text-xl font-bold mb-2 text-center font-heading text-black">{{ $value['title'] }}</h3>
          <p class="text-base md:text-lg text-gray-700 text-center font-body" style="font-size: 15px;">
            {{ $value['description'] }}
          </p>
        </div>
      @endforeach
    </div>
  </section>

  <!-- Dernière section partenaires -->
  <section class="w-full py-16 bg-[#333333] px-30" style="border-bottom: 2px solid #fff;">
    <div class="container mx-auto px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-6 text-center font-heading text-white">{{ $membersTitle }}</h2>
      <p class="text-base md:text-lg text-gray-100 mb-10 text-center font-body" style="font-size: 15px;">
        {{ $membersDesc }}
      </p>
      <div class="flex flex-row gap-8 justify-center items-center">
        @foreach ($members as $member)
          <div class="flex flex-col items-center gap-2">
            <img src="{{ getImageUrl($member['image']) }}" alt="{{ $member['title'] }}"
              class="w-30 h-30 rounded-full object-cover mb-2">
            <h4 class="text-xl font-bold text-center font-heading text-white">{{ $member['title'] }}</h4>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
