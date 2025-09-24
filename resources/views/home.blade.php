@extends('layout')


@php
  $heroTitle = $heroTitle ?? 'Club de Mölkky CRHOM – Convivialité & Précision';
  $heroDesc = $heroDesc ?? "Rejoignez notre club pour découvrir, pratiquer et partager le plaisir du mölkky dans une ambiance amicale et familiale. Tournois, entraînements et rencontres tout au long de l’année !";
  $reassuranceTitle = $reassuranceTitle ?? 'Un club fait pour tous';
  $reassuranceDesc = $reassuranceDesc ?? "Que vous soyez débutant curieux ou joueur confirmé, notre club vous accueille dans un esprit de partage, de convivialité et de fair-play. Ici, chacun trouve sa place et progresse à son rythme.";
  $eventsTitle = $eventsTitle ?? 'Nos prochains événements';
  $events = $events ?? [
    [
      'img' => '/images/event1.jpg',
      'title' => 'Tournoi du Rhône 2024',
      'desc' => "Notre équipe a remporté le tournoi du Rhône lors de l'édition de 2024"
    ],
    [
      'img' => '/images/event2.jpg',
      'title' => 'Inauguration du nouveau terrain',
      'desc' => "Nous avons eu l'honneur d'inaugurer notre nouveau terrain de mölkky en présence des élus locaux."
    ],
    [
      'img' => '/images/event3.jpg',
      'title' => 'Soiree conviviale de fin d\'année',
      'desc' => "Nous vous invitons à notre soirée conviviale de fin d'année pour célébrer ensemble les réussites de l'année écoulée."
    ],
  ];
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
  <img src="/images/hero-img.jpg" alt="Mölkky Hero" class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
    </div>
  </div>
</section>

<section class="w-full pb-16 pt-16 px-30">
  <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
    <div class="flex-1 flex justify-center mb-8 md:mb-0">
  <img src="/images/club-img.jpg" alt="Ambiance club" class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover transition-transform duration-300 ease-in-out hover:scale-105">
    </div>
    <div class="flex-1 flex flex-col items-start justify-center gap-6">
  <h3 class="text-3xl md:text-3xl font-bold mb-2 font-heading">{{ $reassuranceTitle }}</h3>
    <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 15px;">{{ $reassuranceDesc }}</p>
      @include('layouts.cta-button')
    </div>
  </div>
</section>

<section class="w-full pb-24 pt-8 px-30">
  <div class="container mx-auto px-8">
  <h2 class="text-3xl md:text-4xl font-bold mb-15 text-center font-heading">{{ $eventsTitle }}</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
      @foreach ($events as $event)
        <div class="bg-white rounded-lg shadow-md flex flex-col items-center pb-6">
          <img src="{{ $event['img'] }}" alt="{{ $event['title'] }}" class="w-200 h-40 object-cover rounded-md mb-4 transition-transform duration-300 ease-in-out hover:scale-105">
    <h4 class="text-xl font-semibold mb-2 font-heading">{{ $event['title'] }}</h4>
      <p class="text-gray-700 text-center font-body" style="font-size: 14px;">{{ $event['desc'] }}</p>
        </div>
      @endforeach
    </div>
  </div>
</section>
@endsection
