@extends('layout')


@php
  $heroTitle ??= 'Titre principal de la page';
  $heroDesc ??=
      "Petite description d'accroche pour présenter le club, ses valeurs ou son ambiance et ses principales valeurs.";
  $reassuranceTitle ??= 'Titre de réassurance pour la section';
  $reassuranceDesc ??=
      "Un texte rassurant sur l'ambiance, la convivialité, l'encadrement, etc. du club. Ansi que la totalité des activités réalisées par le club tout au long de l'année, nous pouvons savoir quels sont les objectifs du club aussi au niveau compétition et ainsi de suite.";
  $eventsTitle ??= 'Nos prochains événements';
  $events = $events ?? [
      [
          'img' => '/images/event1.jpg',
          'title' => 'Titre événement 1',
          'desc' => "Courte description de l'événement à venir. Informations principales, date, lieu, etc.",
      ],
      [
          'img' => '/images/event2.jpg',
          'title' => 'Titre événement 2',
          'desc' => "Courte description de l'événement à venir. Informations principales, date, lieu, etc.",
      ],
      [
          'img' => '/images/event3.jpg',
          'title' => 'Titre événement 3',
          'desc' => "Courte description de l'événement à venir. Informations principales, date, lieu, etc.",
      ],
  ];
@endphp

@section('head')
  <title>{{ $heroTitle }} - Club de Mölkky</title>
  <meta name="description" content="{{ $heroDesc }}">
@endsection

@section('content')
  <section class="w-full py-16">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
      <div class="flex-1 flex flex-col items-start justify-center gap-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-2 font-heading">{{ $heroTitle }}</h1>
        <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 16px;">{{ $heroDesc }}</p>
        @include('layouts.cta-button')
      </div>
      <div class="flex-1 flex justify-center">
        <img src="/images/hero-img.jpg" alt="Mölkky Hero" class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover">
      </div>
    </div>
  </section>

  <hr class="border-wood-light my-16 w-3/4 mx-auto" />

  <section class="w-full pb-16">
    <div class="container mx-auto flex flex-col md:flex-row items-center gap-12 px-8">
      <div class="flex-1 flex justify-center mb-8 md:mb-0">
        <img src="/images/club-img.jpg" alt="Ambiance club"
          class="max-w-xs md:max-w-md rounded-lg shadow-lg object-cover">
      </div>
      <div class="flex-1 flex flex-col items-start justify-center gap-6">
        <h3 class="text-2xl md:text-3xl font-bold mb-2 font-heading">{{ $reassuranceTitle }}</h3>
        <p class="text-base md:text-lg text-gray-700 mb-4 font-body" style="font-size: 16px;">{{ $reassuranceDesc }}</p>
        @include('layouts.cta-button')
      </div>
    </div>
  </section>

  <section class="w-full pb-24 pt-8">
    <div class="container mx-auto px-8">
      <h2 class="text-3xl md:text-4xl font-bold mb-10 text-center font-heading">{{ $eventsTitle }}</h2>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        @foreach ($events as $event)
          <div class="bg-white rounded-lg shadow-md flex flex-col items-center p-6">
            <img src="{{ $event['img'] }}" alt="{{ $event['title'] }}" class="w-full h-40 object-cover rounded-md mb-4">
            <h4 class="text-xl font-semibold mb-2 font-heading">{{ $event['title'] }}</h4>
            <p class="text-gray-700 text-center font-body" style="font-size: 16px;">{{ $event['desc'] }}</p>
          </div>
        @endforeach
      </div>
    </div>
  </section>
@endsection
