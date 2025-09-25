@extends('layout')

@section('head')
  <title>Contact - Club de Mölkky</title>
  <meta name="description"
    content="Contactez le club de Mölkky CRHOM pour toute question, demande d'information ou inscription.">
@endsection

@section('content')
  <section class="w-full pt-16 pb-8 bg-gradient-to-b from-[var(--color-wood-light)]/20 to-[var(--color-white)]">
    <div class="container mx-auto px-4 sm:px-8 flex flex-col items-center animate-fade-in">
      <h1 class="text-4xl md:text-5xl font-bold mb-4 font-heading text-center tracking-tight text-wood-dark drop-shadow-sm">
        Contactez-nous
      </h1>
      <p class="text-lg md:text-xl text-gray-700 mb-10 font-body text-center max-w-2xl leading-relaxed">
        Pour toute question, demande d'information ou inscription, n'hésitez pas à nous contacter !
      </p>
    </div>
  </section>

  <section class="w-full pb-16">
    <div class="container mx-auto px-4 sm:px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white/90 rounded-xl shadow-lg p-8 flex flex-col items-center transition-transform hover:scale-105 duration-200">
        <div class="mb-3">
          <!-- Heroicon: Envelope -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-wood-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-4-4 4m8 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v4" /></svg>
        </div>
        <h2 class="text-xl font-bold mb-1 font-heading text-wood-dark">Email</h2>
        <p class="text-gray-700 font-body text-center text-base">contact@molkkyclub.fr</p>
      </div>
      <div class="bg-white/90 rounded-xl shadow-lg p-8 flex flex-col items-center transition-transform hover:scale-105 duration-200">
        <div class="mb-3">
          <!-- Heroicon: Phone -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-wood-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2V5zm0 10a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H5a2 2 0 01-2-2v-2zm8-8h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V9a2 2 0 012-2zm0 10h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2a2 2 0 012-2z" /></svg>
        </div>
        <h2 class="text-xl font-bold mb-1 font-heading text-wood-dark">Téléphone</h2>
        <p class="text-gray-700 font-body text-center text-base">01 23 45 67 89</p>
      </div>
      <div class="bg-white/90 rounded-xl shadow-lg p-8 flex flex-col items-center transition-transform hover:scale-105 duration-200">
        <div class="mb-3">
          <!-- Heroicon: Location Marker -->
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-wood-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c1.104 0 2-.896 2-2s-.896-2-2-2-2 .896-2 2 .896 2 2 2zm0 10c-4.418 0-8-3.582-8-8 0-4.418 3.582-8 8-8s8 3.582 8 8c0 4.418-3.582 8-8 8z" /></svg>
        </div>
        <h2 class="text-xl font-bold mb-1 font-heading text-wood-dark">Adresse</h2>
        <p class="text-gray-700 font-body text-center text-base">123 rue du Mölkky, 75000 Paris</p>
      </div>
    </div>
  </section>

  <section class="w-full pb-12">
    <div class="container mx-auto px-4 sm:px-8 flex flex-col items-center">

      {{-- Message de succès --}}
      @if (session('success'))
        <div class="w-full max-w-2xl mb-6 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg">
          {{ session('success') }}
        </div>
      @endif

      {{-- Affichage des erreurs de validation --}}
      @if ($errors->any())
        <div class="w-full max-w-2xl mb-6 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-lg">
          <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('contact.store') }}"
        class="w-full max-w-2xl bg-white/95 rounded-2xl shadow-xl pt-10 pb-10 px-4 sm:px-10 flex flex-col gap-8 border border-[var(--color-wood-light)] animate-fade-in">
        @csrf

        <div>
          <label for="first_name" class="block text-wood-light font-bold mb-2 font-body flex items-center gap-2">
            <!-- Heroicon: User -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-wood-light" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            Prénom
          </label>
          <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-2 focus:ring-wood-light font-body placeholder:text-gray-400 transition-shadow focus:shadow-lg"
            placeholder="Votre prénom" required autocomplete="given-name">
        </div>

        <div>
          <label for="last_name" class="block text-wood-light font-bold mb-2 font-body flex items-center gap-2">
            <!-- Heroicon: User -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-wood-light" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A9 9 0 0112 15a9 9 0 016.879 2.804M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
            Nom
          </label>
          <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-2 focus:ring-wood-light font-body placeholder:text-gray-400 transition-shadow focus:shadow-lg"
            placeholder="Votre nom" required autocomplete="family-name">
        </div>

        <div>
          <label for="email" class="block text-wood-light font-bold mb-2 font-body flex items-center gap-2">
            <!-- Heroicon: Mail -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-wood-light" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12l-4-4-4 4m8 0v6a2 2 0 01-2 2H6a2 2 0 01-2-2v-6m16-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v4" /></svg>
            Email
          </label>
          <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-2 focus:ring-wood-light font-body placeholder:text-gray-400 transition-shadow focus:shadow-lg"
            placeholder="Votre email" required autocomplete="email">
        </div>

        <div>
          <label for="message" class="block text-wood-light font-bold mb-2 font-body flex items-center gap-2">
            <!-- Heroicon: Chat -->
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-wood-light" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M21 12c0 4.418-4.03 8-9 8a9.77 9.77 0 01-4-.8l-4.28 1.07a1 1 0 01-1.21-1.21l1.07-4.28A9.77 9.77 0 013 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" /></svg>
            Message
          </label>
          <textarea id="message" name="message" rows="8"
            class="w-full px-6 py-6 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-2 focus:ring-wood-light font-body placeholder:text-gray-400 transition-shadow focus:shadow-lg"
            placeholder="Votre message" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit"
          class="flex items-center justify-center gap-2 bg-wood-dark text-white font-bold py-3 px-8 rounded-lg shadow-lg hover:bg-wood-light hover:text-wood-dark transition-all duration-200 font-heading text-lg tracking-wide focus:outline-none focus:ring-2 focus:ring-wood-light focus:ring-offset-2 group">
          Envoyer
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transition-transform group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
        </button>
      </form>
    </div>
  </section>
@endsection
