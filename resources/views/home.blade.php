@extends('layout')
@use(App\Models\Homepage)

@php
  $heroTitle = Homepage::find('hero_title')->value ?? 'Club de Mölkky CRHOM – Convivialité & Précision';
  $heroDesc = Homepage::find('hero_description')->value ?? "Rejoignez notre club pour découvrir, pratiquer et partager le plaisir du mölkky dans une ambiance amicale et familiale. Tournois, entraînements et rencontres tout au long de l'année !";
  $heroImage = Homepage::find('hero_image')->value ?? '/images/hero-img.jpg';

  $sectionsData = Homepage::find('sections')->value ?? '[]';
  $sections = json_decode($sectionsData, true) ?? [];

  $eventsTitle = Homepage::find('events_title')->value ?? 'Nos prochains événements';
  $eventsData = Homepage::find('events')->value ?? '[]';
  $events = json_decode($eventsData, true) ?? [];

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
        'title' => 'Soiree conviviale de fin d\'année',
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
  <section class="w-full py-16 px-30">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
      <div class="flex-1 flex flex-col items-start justify-center gap-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 font-heading">{{ $heroTitle }}</h1>
        <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 15px;">{{ $heroDesc }}</p>
        @include('layouts.cta-button')
      </div>
      <div class="flex-1 flex justify-center">
        <img src="{{ Storage::url(path: $heroImage) }}" alt="{{ $heroTitle }}"
          class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
      </div>
    </div>
  </section>

  <section class="grid grid-cols-1 w-full pb-16 pt-16 px-30 gap-8">
    @foreach ($sections as $section)
      <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
        <div class="flex-1 flex justify-center mb-8 md:mb-0">
          <img src="{{ Storage::url(path: $section['image']) }}" alt="{{ $section['title'] }}"
            class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
        </div>
        <div class="flex-1 flex flex-col items-start justify-center gap-6">
          <h3 class="text-3xl md:text-3xl font-bold mb-2 font-heading">{{ $section['title'] }}</h3>
          <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 15px;">
            {{ $section['description'] }}</p>
          @include('layouts.cta-button')
        </div>
      </div>
    @endforeach
  </section>

  <section class="w-full pb-24 pt-8 px-30">
    <div class="container mx-auto px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-15 text-center font-heading">{{ $eventsTitle }}</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($events as $event)
          <div class="bg-white rounded-lg shadow-md flex flex-col items-center pb-6">
            <img src="{{ Storage::url($event['image']) }}" alt="{{ $event['title'] }}"
              class="w-200 h-40 object-cover rounded-md mb-4 transition-transform duration-300 ease-in-out hover:scale-105">
            <h4 class="text-xl font-semibold mb-2 font-heading">{{ $event['title'] }}</h4>
            <div class="text-gray-700 text-center font-body prose prose-sm max-w-none px-4" style="font-size: 14px;">
              {!! $event['description'] !!}
            </div>
          </div>
        @endforeach
      </div>
  </section>
@endsection
