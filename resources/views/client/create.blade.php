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
      <a class="dark:text-gray-300 hover:underline" href="{{ route('dashboard') }}">Retour au dashboard</a>

      <button class="dark:text-gray-300 border rounded-md p-2 hover:border-gray-700" type="submit">Créer le
        client</button>
    </div>
  </form>

</x-guest-layout>