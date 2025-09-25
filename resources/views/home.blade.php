@extends('layout')
@use(App\Models\Homepage)

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

  $heroTitle = Homepage::find('hero_title')->value ?? 'Club de Mölkky CRHOM – Convivialité & Précision';
  $heroDesc = Homepage::find('hero_description')->value ?? "Rejoignez notre club pour découvrir, pratiquer et partager le plaisir du mölkky dans une ambiance amicale et familiale. Tournois, entraînements et rencontres tout au long de l'année !";
  $heroImage = Homepage::find('hero_image')->value ?? '/images/hero-img.jpg';

  $sectionsData = Homepage::find('sections')->value ?? '[]';
  $sections = json_decode($sectionsData, true) ?? [];

  if (empty($sections)) {
    $sections = [
      [
        'image' => '/images/club-img.jpg',
        'title' => 'Un club fait pour tous',
        'description' => "Que vous soyez débutant curieux ou joueur confirmé, notre club vous accueille dans un esprit de partage, de convivialité et de fair-play. Ici, chacun trouve sa place et progresse à son rythme."
      ],
    ];
  }

  $eventsTitle = Homepage::find('events_title')->value ?? 'Nos prochains événements';
  $lastEvents = \App\Filament\Pages\Homepage::getLatestEvents() ?? [];
  $events = [];

  foreach ($lastEvents as $event) {
    $events[] = [
      'image' => $event->image,
      'title' => $event->title,
      'description' => $event->description,
    ];
  }

  if (empty($events)) {
    $events = [
      [
        'image' => '/images/event1.jpg',
        'title' => 'Tournoi du Rhône 2024',
        'description' => "Notre équipe a remporté le tournoi du Rhône lors de l'édition de 2024"
      ],
      [
        'image' => '/images/event2.jpg',
        'title' => 'Inauguration du nouveau terrain',
        'description' => "Nous avons eu l'honneur d'inaugurer notre nouveau terrain de mölkky en présence des élus locaux."
      ],
      [
        'image' => '/images/event3.jpg',
        'title' => 'Soirée conviviale de fin d\'année',
        'description' => "Nous vous invitons à notre soirée conviviale de fin d'année pour célébrer ensemble les réussites de l'année écoulée."
      ],
    ];
  }
@endphp

@section('head')
  <title>{{ $heroTitle }} - Club de Mölkky</title>
  <meta name="description" content="{{ $heroDesc }}">
@endsection

@section('content')
  {{-- Section Hero --}}
  <section class="w-full py-12 md:py-16 lg:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex flex-col md:flex-row items-center gap-8 lg:gap-12">
        {{-- Contenu texte --}}
        <div class="flex-1 text-center md:text-left">
          <h1 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 font-heading">
            {{ $heroTitle }}
          </h1>
          <div class="text-sm sm:text-base lg:text-lg text-gray-700 mb-6 font-body">
            {!! $heroDesc !!}
          </div>
          @include('layouts.cta-button')
        </div>
        {{-- Image --}}
        <div class="flex-1 w-full">
          <img src="{{ getImageUrl($heroImage) }}" alt="{{ $heroTitle }}"
            class="w-full max-w-sm md:max-w-md mx-auto rounded-lg shadow-lg object-cover transition-transform duration-300 hover:scale-105">
        </div>
      </div>
    </div>
  </section>

  {{-- Sections alternées --}}
  <section class="w-full py-12 md:py-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="space-y-12 md:space-y-16">
        @foreach ($sections as $index => $section)
          <div class="flex flex-col {{ $loop->even ? 'md:flex-row-reverse' : 'md:flex-row' }} items-center gap-8 lg:gap-12">
            {{-- Image --}}
            <div class="flex-1 w-full">
              <img src="{{ getImageUrl($section['image']) }}" alt="{{ $section['title'] }}"
                class="w-full max-w-sm md:max-w-md mx-auto rounded-lg shadow-lg object-cover transition-transform duration-300 hover:scale-105">
            </div>
            {{-- Contenu --}}
            <div class="flex-1 text-center md:text-left">
              <h3 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-4 font-heading">
                {{ $section['title'] }}
              </h3>
              <div class="text-sm sm:text-base lg:text-lg text-gray-700 mb-6 font-body">
                {!! $section['description'] !!}
              </div>
              @include('layouts.cta-button')
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>

  {{-- Section Événements --}}
  <section class="w-full py-12 md:py-16 lg:py-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <h2 class="text-2xl sm:text-3xl lg:text-4xl font-bold mb-8 md:mb-12 font-heading text-center max-md:text-left">
        {{ $eventsTitle }}
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
        @foreach ($events as $event)
          <div class="bg-white rounded-lg shadow-md overflow-hidden group">
            <div class="aspect-w-16 aspect-h-9 overflow-hidden">
              <img src="{{ getImageUrl($event['image']) }}" alt="{{ $event['title'] }}"
                class="w-full h-40 object-cover transition-transform duration-300 group-hover:scale-105">
            </div>
            <div class="p-4 lg:p-6">
              <h4 class="text-lg sm:text-xl font-semibold mb-2 font-heading">
                {{ $event['title'] }}
              </h4>
              <div class="text-sm text-gray-700 font-body prose prose-sm max-w-none">
                {!! $event['description'] !!}
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection