@extends('layout')

@section('head')
  <title>Contact - Club de Mölkky</title>
  <meta name="description"
    content="Contactez le club de Mölkky CRHOM pour toute question, demande d'information ou inscription.">
@endsection

@section('content')
  <section class="w-full pt-16 pb-8 px-30">
    <div class="container mx-auto px-8 flex flex-col items-center">
      <h1 class="text-3xl md:text-4xl font-bold mb-2 font-heading text-center">Contactez-nous</h1>
      <p class="text-base md:text-lg text-gray-700 mb-8 font-body text-center" style="font-size: 15px;">Pour toute
        question, demande d'information ou inscription, n'hésitez pas à nous contacter !</p>
    </div>
  </section>

  <section class="w-full pb-16 px-30">
    <div class="container mx-auto px-8 grid grid-cols-1 md:grid-cols-3 gap-8">
      <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
        <h2 class="text-xl font-bold mb-2 font-heading text-wood-dark">Email</h2>
        <p class="text-gray-700 font-body text-center">contact@molkkyclub.fr</p>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
        <h2 class="text-xl font-bold mb-2 font-heading text-wood-dark">Téléphone</h2>
        <p class="text-gray-700 font-body text-center">01 23 45 67 89</p>
      </div>
      <div class="bg-white rounded-lg shadow-md p-6 flex flex-col items-center">
        <h2 class="text-xl font-bold mb-2 font-heading text-wood-dark">Adresse</h2>
        <p class="text-gray-700 font-body text-center">123 rue du Mölkky, 75000 Paris</p>
      </div>
    </div>
  </section>

  <section class="w-full pb-12 px-30">
    <div class="container mx-auto px-8 flex flex-col items-center">

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
        class="w-full max-w-2xl bg-white rounded-lg shadow-md pt-8 pb-8 pr-16 pl-16 flex flex-col gap-8">
        @csrf

        <div>
          <label for="first_name" class="block text-wood-light font-bold mb-2 font-body">Prénom</label>
          <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-1 focus:ring-wood-light font-body placeholder:text-gray-400"
            placeholder="Votre prénom" required>
        </div>

        <div>
          <label for="last_name" class="block text-wood-light font-bold mb-2 font-body">Nom</label>
          <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-1 focus:ring-wood-light font-body placeholder:text-gray-400"
            placeholder="Votre nom" required>
        </div>

        <div>
          <label for="email" class="block text-wood-light font-bold mb-2 font-body">Email</label>
          <input type="email" id="email" name="email" value="{{ old('email') }}"
            class="w-full px-6 py-3 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-1 focus:ring-wood-light font-body placeholder:text-gray-400"
            placeholder="Votre email" required>
        </div>

        <div>
          <label for="message" class="block text-wood-light font-bold mb-2 font-body">Message</label>
          <textarea id="message" name="message" rows="8"
            class="w-full px-6 py-6 border-2 border-wood-light rounded-lg bg-[#fff] text-wood-dark focus:outline-none focus:ring-1 focus:ring-wood-light font-body placeholder:text-gray-400"
            placeholder="Votre message" required>{{ old('message') }}</textarea>
        </div>

        <button type="submit"
          class="bg-[#fff] text-black font-bold py-3 px-6 rounded-lg shadow hover:bg-[#f5f5f5] transition-colors duration-200 font-heading">Envoyer</button>
      </form>
    </div>
  </section>
@endsection
