<x-guest-layout>
  <form method="POST" action="{{ route('invoice.store') }}">
    @csrf

    <!-- Nom de la facture -->
    <div>
      <div class="flex gap-2">
        <x-input-label for="name" :value="__('Nom de la facture')" />
        <span class="text-red-600 items-center">*</span>
      </div>
      <x-text-input id="name" name="name" class="block mt-1 w-full" type="text" :value="old('name')" required
        autofocus />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Choix du client -->
    <div class="mt-4">
      <x-input-label for="client_id" :value="__('Client')" />
      <select id="client_id" name="client_id" required
        class="block mt-1 w-full dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:text-white focus:ring focus:ring-indigo-300">
        <option value="" disabled selected>Choisir un client</option>
        @foreach ($clientsNames as $id => $name)
      <option value="{{ $id }}">{{ $name }}</option>
    @endforeach
      </select>
      <x-input-error :messages="$errors->get('client_id')" class="mt-2" />
    </div>
    </select>

    <!-- Date de début -->
    <div class="mt-4">
      <x-input-label for="start" :value="'Date de début'" />
      <x-text-input id="start" name="start" type="date" class="block mt-1 w-full" :value="old('start')" required />
      <x-input-error :messages="$errors->get('start')" class="mt-2" />
    </div>

    <!-- Date de fin -->
    <div class="mt-4">
      <x-input-label for="end" :value="'Date de fin'" />
      <x-text-input id="end" name="end" type="date" class="block mt-1 w-full" :value="old('end')" required />
      <x-input-error :messages="$errors->get('end')" class="mt-2" />
    </div>

    <!-- Conditions de paiement -->
    <div class="mt-4">
      <div class="flex gap-2">
        <x-input-label for="payments_terms" :value="__('Conditions de paiement')" />
        <span class="text-red-600 items-center">*</span>
      </div>

      <select id="payments_terms" name="payments_terms" required
        class="block mt-1 w-full dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:text-white focus:ring focus:ring-indigo-300">
        <option value="" disabled selected>Choisir une condition</option>
        <option value="Termes de paiement 1">Détails bancaires
          ....
          IBAN DE 85 12345678 0123456789
          BIC PENKDEFF
          N° Siret 380 000 000 000xx
          Code APE 0815 C
          N° TVA Intracom. DE 84 380 000 000</option>

      </select>

      <x-input-error :messages="$errors->get('payments_terms')" class="mt-2" />
    </div>

    <x-input-error :messages="$errors->get('payments_terms')" class="mt-2" />
    </div>




    <!-- Boutons -->
    <div class="flex justify-between items-center mt-6">
      <a class="dark:text-gray-300 hover:underline" href="{{ route('invoice.index') }}">Retour à la liste</a>

      <button class="dark:text-gray-300 border rounded-md p-2 hover:text-teal-600" type="submit">
        Créer la facture
      </button>
    </div>
  </form>
</x-guest-layout>