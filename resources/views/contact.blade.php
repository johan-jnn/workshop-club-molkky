@extends('layout')

@section('head')
  <title>Contact - Club de Mölkky</title>
  <meta name="description"
    content="Contactez le club de Mölkky CRHOM pour toute question, demande d'information ou inscription.">
@endsection

@section('content')
  {{-- Section Hero --}}
  <section class="w-full py-12 md:py-16 lg:py-20 bg-gradient-to-b">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-3xl mx-auto text-center">
        <h1 class="text-2xl sm:text-3xl lg:text-5xl font-bold mb-4 font-heading text-gray-900">
          Contactez-nous
        </h1>
        <p class="text-sm sm:text-base lg:text-xl text-gray-600 font-body leading-relaxed">
          Pour toute question, demande d'information ou inscription, n'hésitez pas à nous contacter !
        </p>
      </div>
    </div>
  </section>

  {{-- Section Informations de contact --}}
  <section class="w-full pb-12 md:pb-16">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6 lg:gap-8 max-w-5xl mx-auto">
        {{-- Email --}}
        <div
          class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 lg:p-8 flex flex-col items-center group">
          <div class="mb-4 p-3 bg-gray-100 rounded-full group-hover:bg-gray-200 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 lg:h-8 lg:w-8 text-gray-700" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
          </div>
          <h2 class="text-lg sm:text-xl font-bold mb-2 font-heading text-gray-900">Email</h2>
          <a href="mailto:contact@molkkyclub.fr"
            class="text-sm sm:text-base text-gray-600 hover:text-gray-900 transition-colors duration-200 font-body">
            contact@molkkyclub.fr
          </a>
        </div>

        {{-- Téléphone --}}
        <div
          class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 lg:p-8 flex flex-col items-center group">
          <div class="mb-4 p-3 bg-gray-100 rounded-full group-hover:bg-gray-200 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 lg:h-8 lg:w-8 text-gray-700" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
          </div>
          <h2 class="text-lg sm:text-xl font-bold mb-2 font-heading text-gray-900">Téléphone</h2>
          <a href="tel:0123456789"
            class="text-sm sm:text-base text-gray-600 hover:text-gray-900 transition-colors duration-200 font-body">
            01 23 45 67 89
          </a>
        </div>

        {{-- Adresse --}}
        <div
          class="bg-white rounded-xl shadow-md hover:shadow-xl transition-all duration-300 p-6 lg:p-8 flex flex-col items-center group sm:col-span-2 lg:col-span-1">
          <div class="mb-4 p-3 bg-gray-100 rounded-full group-hover:bg-gray-200 transition-colors duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 sm:h-7 sm:w-7 lg:h-8 lg:w-8 text-gray-700" fill="none"
              viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
          <h2 class="text-lg sm:text-xl font-bold mb-2 font-heading text-gray-900">Adresse</h2>
          <p class="text-sm sm:text-base text-gray-600 text-center font-body">
            123 rue du Mölkky<br>75000 Paris
          </p>
        </div>
      </div>
    </div>
  </section>

  {{-- Section Formulaire --}}
  <section class="w-full pb-12 md:pb-16 lg:pb-24">
    <div class="container mx-auto px-4 sm:px-6 lg:px-8">
      <div class="max-w-2xl mx-auto">

        {{-- Message de succès --}}
        @if (session('success'))
          <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg flex items-center gap-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd"
                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                clip-rule="evenodd" />
            </svg>
            <span class="text-sm sm:text-base">{{ session('success') }}</span>
          </div>
        @endif

        {{-- Erreurs de validation --}}
        @if ($errors->any())
          <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg">
            <div class="flex items-start gap-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 flex-shrink-0 mt-0.5" viewBox="0 0 20 20"
                fill="currentColor">
                <path fill-rule="evenodd"
                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                  clip-rule="evenodd" />
              </svg>
              <ul class="text-sm sm:text-base space-y-1">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          </div>
        @endif

        {{-- Formulaire --}}
        <form method="POST" action="{{ route('contact.store') }}"
          class="bg-white rounded-2xl shadow-xl p-6 sm:p-8 lg:p-10 border border-gray-100">
          @csrf

          <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 sm:gap-6 mb-4 sm:mb-6">
            {{-- Prénom --}}
            <div>
              <label for="first_name" class="block text-sm font-semibold text-gray-700 mb-2 font-body">
                Prénom
              </label>
              <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-sm sm:text-base"
                placeholder="Jean" required autocomplete="given-name">
            </div>

            {{-- Nom --}}
            <div>
              <label for="last_name" class="block text-sm font-semibold text-gray-700 mb-2 font-body">
                Nom
              </label>
              <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
                class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-sm sm:text-base"
                placeholder="Dupont" required autocomplete="family-name">
            </div>
          </div>

          {{-- Email --}}
          <div class="mb-4 sm:mb-6">
            <label for="email" class="block text-sm font-semibold text-gray-700 mb-2 font-body">
              Email
            </label>
            <input type="email" id="email" name="email" value="{{ old('email') }}"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 text-sm sm:text-base"
              placeholder="jean.dupont@example.com" required autocomplete="email">
          </div>

          {{-- Message --}}
          <div class="mb-6 sm:mb-8">
            <label for="message" class="block text-sm font-semibold text-gray-700 mb-2 font-body">
              Message
            </label>
            <textarea id="message" name="message" rows="6"
              class="w-full px-4 py-2.5 border border-gray-300 rounded-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200 resize-none text-sm sm:text-base"
              placeholder="Votre message..." required>{{ old('message') }}</textarea>
          </div>

          {{-- Bouton Submit --}}
          <button type="submit"
            class="w-full sm:w-auto px-6 sm:px-8 py-3 bg-gray-800 hover:bg-gray-700 text-white font-semibold rounded-lg shadow-md hover:shadow-lg transition-all duration-300 flex items-center justify-center gap-2 group text-sm sm:text-base">
            <span>Envoyer le message</span>
            <svg xmlns="http://www.w3.org/2000/svg"
              class="h-4 w-4 sm:h-5 sm:w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24"
              stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
            </svg>
          </button>
        </form>
      </div>
    </div>
  </section>
@endsection