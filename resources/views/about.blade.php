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
      ['title' => 'Esprit d\'équipe', 'description' => "L'entraide et la solidarité. Car ensemble, nous sommes plus forts."],
    ];
  }

  $membersTitle = Aboutpage::find('members_title')->value ?? 'Notre bureau';
  $membersDesc = Aboutpage::find('members_description')->value ?? 'C\'est à eux que nous devons la bonne organisation du club et de ses événements.';
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
  {{-- Section Hero --}}
  <section class="w-full py-12 md:py-16 lg:py-20 bg-gray-800">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row items-center gap-8 lg:gap-12">
        {{-- Contenu texte --}}
        <div class="flex-1 text-center md:text-left order-2 md:order-1">
          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 font-heading text-white">
            {{ $heroTitle }}
          </h1>
          <div class="text-sm sm:text-base lg:text-lg text-gray-100 mb-6 font-body leading-relaxed">
            {!! $heroDesc !!}
          </div>
          @include('layouts.cta-button')
        </div>
        {{-- Image --}}
        <div class="flex-1 w-full order-1 md:order-2">
          <img src="{{ getImageUrl($heroImage) }}" alt="{{ $heroTitle }}"
            class="w-full max-w-xs sm:max-w-sm md:max-w-md mx-auto rounded-lg shadow-xl object-cover transition-transform duration-300 hover:scale-105">
        </div>
      </div>
    </div>
  </section>

  {{-- Section Histoire --}}
  <section class="w-full py-12 md:py-16 lg:py-20">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-10 md:mb-16 text-center font-heading">
        {{ $storiesTitle }}
      </h2>
      <div class="space-y-10 sm:space-y-12 lg:space-y-16">
        @foreach ($stories as $index => $story)
          <div
            class="flex flex-col {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-6 sm:gap-8 lg:gap-12">
            {{-- Image --}}
            <div class="flex-1 w-full">
              <div class="relative overflow-hidden rounded-lg shadow-lg group">
                <img src="{{ getImageUrl($story['image']) }}" alt="{{ $story['title'] }}"
                  class="w-full h-48 sm:h-56 md:h-64 lg:h-72 object-cover transition-transform duration-500 group-hover:scale-110">
              </div>
            </div>
            {{-- Contenu --}}
            <div class="flex-1 text-center md:text-left px-2 sm:px-0">
              <h3 class="text-xl sm:text-2xl lg:text-3xl font-bold mb-3 font-heading text-gray-900">
                {{ $story['title'] }}
              </h3>
              <div class="text-sm sm:text-base lg:text-lg text-gray-700 font-body leading-relaxed">
                {!! $story['description'] !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  <hr class="border-gray-300 w-3/4 mx-auto" />

  {{-- Section Valeurs --}}
  <section class="w-full py-12 md:py-16 lg:py-20 bg-gray-50">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-10 md:mb-12 text-center font-heading">
        {{ $valuesTitle }}
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 max-w-5xl mx-auto">
        @foreach ($values as $value)
          <div class="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 p-6 lg:p-8 text-center">
            <h3 class="text-lg sm:text-xl font-bold mb-3 font-heading text-gray-900">
              {{ $value['title'] }}
            </h3>
            <div class="text-sm sm:text-base text-gray-600 font-body leading-relaxed">
              {!! $value['description'] !!}
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Section Bureau/Équipe --}}
  <section class="w-full py-12 md:py-16 lg:py-20 bg-gradient-to-b from-gray-800 to-gray-900">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 text-center font-heading text-white">
        {{ $membersTitle }}
      </h2>
      <div
        class="text-sm sm:text-base lg:text-lg text-gray-200 mb-8 sm:mb-10 lg:mb-12 text-center font-body max-w-3xl mx-auto leading-relaxed">
        {!! $membersDesc !!}
      </div>
      <div
        class="grid grid-cols-2 xs:grid-cols-3 sm:grid-cols-4 md:grid-cols-6 gap-4 sm:gap-6 lg:gap-8 max-w-5xl mx-auto">
        @foreach ($members as $member)
          <div class="flex flex-col items-center group">
            <div class="relative mb-3">
              <img src="{{ getImageUrl($member['image']) }}" alt="{{ $member['title'] }}"
                class="w-20 h-20 xs:w-24 xs:h-24 sm:w-28 sm:h-28 lg:w-32 lg:h-32 rounded-full object-cover border-3 border-white/80 group-hover:border-white transition-all duration-300 shadow-lg">
              <div
                class="absolute inset-0 rounded-full bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
              </div>
            </div>
            <h4 class="text-xs xs:text-sm sm:text-base font-semibold text-center font-heading text-white">
              {{ $member['title'] }}
            </h4>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection