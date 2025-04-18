<x-guest-layout>
  <form method="POST" action="{{ route('client.store') }}">
    @csrf

    <!-- Bussiness Name -->
    <div>
      <div class="flex gap-2">

        <x-input-label for="bussiness_name" :value="__('Nom de l\'entreprise')" /> <span
          class="text-red-600 items-center">*</span>
      </div>

      <x-text-input id="bussiness_name" name="bussiness_name" class="block mt-1 w-full" type="text"
        :value="old('bussiness_name')" required autofocus />
      <x-input-error :messages="$errors->get('bussiness_name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <div class="flex gap-2">
        <x-input-label for="email" :value="__('Email')" />
        <span class="text-red-600 items-center">*</span>
      </div>

      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Tarif horaire -->
    <div class="mt-4">
      <div class="flex gap-2">
        <x-input-label for="hourly_rate" :value="__('Tarif horaire (€)')" />
        <span class="text-red-600 items-center">*</span>
      </div>
      <x-text-input id="hourly_rate" name="hourly_rate" class="block mt-1 w-full" type="number" step="1"
        :value="old('hourly_rate', 50)" required />
      <x-input-error :messages="$errors->get('hourly_rate')" class="mt-2" />
    </div>

    <!-- Ical URL -->
    <div class="mt-4">
      <div class="flex gap-2">

        <x-input-label for="ical_url" :value="__('url Ical')" />
        <span class="text-red-600 items-center">*</span>

      </div>
      <x-text-input id="ical_url" class="block mt-1 w-full" type="url" name="ical_url" :value="old('ical_url')" />
      <x-input-error :messages="$errors->get('ical_url')" class="mt-2" />
    </div>


    <div class="flex  justify-between items-center mt-6">
      <a href="{{ route('dashboard') }}" class="relative inline-block group text-gray-800 dark:text-white">
        Retour au dashboard
        <span
          class="absolute left-0 -bottom-1 h-0.5 w-full scale-x-0 origin-bottom-right bg-gray-400 transition-transform duration-300 group-hover:scale-x-100 group-hover:origin-bottom-left">
        </span>
      </a>



      <button type="submit"
        class="inline-flex items-center justify-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Créer le client
      </button>

    </div>
  </form>

</x-guest-layout>