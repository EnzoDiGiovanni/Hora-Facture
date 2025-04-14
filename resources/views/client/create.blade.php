<x-guest-layout>
  <form method="POST" action="{{ route('client.store') }}">
    @csrf

    <!-- Bussiness Name -->
    <div>
      <x-input-label for="bussiness_name" :value="__('Nom de l\'entreprise')" />

      <x-text-input id="bussiness_name" name="bussiness_name" class="block mt-1 w-full" type="text"
        :value="old('bussiness_name')" required autofocus />
      <x-input-error :messages="$errors->get('bussiness_name')" class="mt-2" />
    </div>

    <!-- Email Address -->
    <div class="mt-4">
      <x-input-label for="email" :value="__('Email')" />
      <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
      <x-input-error :messages="$errors->get('email')" class="mt-2" />
    </div>

    <!-- Ical URL -->
    <div class="mt-4">
      <x-input-label for="ical_url" :value="__('url Ical')" />
      <x-text-input id="ical_url" class="block mt-1 w-full" type="ical_url" name="ical_url" :value="old('ical_url')" />
      <x-input-error :messages="$errors->get('ical_url')" class="mt-2" />
    </div>


    <div class="flex  justify-between items-center mt-6">
      <a class="dark:text-gray-300 hover:underline" href="{{ route('dashboard') }}">Retour au dashboard</a>

      <button class="dark:text-gray-300 border rounded-md p-2 hover:text-teal-600" type="submit">Créer un
        client</button>
    </div>
  </form>

</x-guest-layout>