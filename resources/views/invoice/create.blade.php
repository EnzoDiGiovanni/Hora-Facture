<x-guest-layout>
  <form method="POST" action="{{ route('invoice.store') }}">
    @csrf

    <!-- Nom de la facture -->
    <div>
      <div class="flex gap-2">
        <x-input-label for="name" :value="__('Nom de la facture')" />
      </div>
      <x-text-input id="name" name="name" class="block mt-1 w-full" type="text" :value="old('name')" autofocus />
      <x-input-error :messages="$errors->get('name')" class="mt-2" />
    </div>

    <!-- Choix du client -->
    <div class="mt-4">
      <div class="flex gap-2">
        <x-input-label for="client_id" :value="__('Client')" />
        <span class="text-red-600 items-center">*</span>
      </div>

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
      <div class="flex gap-2">
        <x-input-label for="start" :value="'Date de début'" />
        <span class="text-red-600 items-center">*</span>
      </div>

      <x-text-input id="start" name="start" type="date" class="block mt-1 w-full" :value="old('start')" required />
      <x-input-error :messages="$errors->get('start')" class="mt-2" />
    </div>

    <!-- Date de fin -->
    <div class="mt-4">
      <div class="flex gap-2">
        <x-input-label for="end" :value="'Date de fin'" />
        <span class="text-red-600 items-center">*</span>
      </div>
      <x-text-input id="end" name="end" type="date" class="block mt-1 w-full" :value="old('end')" required />
      <x-input-error :messages="$errors->get('end')" class="mt-2" />
    </div>


    <!-- Notes complémentaires -->
    <div class="mt-4">
      <x-input-label for="notes" :value="__('Notes complémentaires')" />
      <textarea id="notes" name="notes"
        class="block mt-1 w-full dark:bg-gray-800 border-gray-300 dark:border-gray-700 rounded-md shadow-sm dark:text-white focus:ring focus:ring-indigo-300"
        rows="4">{{ old('notes', $invoice->notes ?? '') }}</textarea>
      <x-input-error :messages="$errors->get('notes')" class="mt-2" />
    </div>



    <div class="flex justify-between items-center mt-6">

      <a class="relative inline-block group text-gray-800 dark:text-white" href="{{ route('invoice.index') }}">Retour
        au dashboard
        <span
          class="absolute left-0 -bottom-1 h-0.5 w-full scale-x-0 origin-bottom-right bg-gray-400 transition-transform duration-300 group-hover:scale-x-100 group-hover:origin-bottom-left">
        </span>
      </a>


      <button type="submit"
        class="inline-flex items-center justify-center px-6 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-sm text-white dark:text-gray-800 uppercase tracking-wider hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
        Créer la facture
      </button>

    </div>
  </form>


</x-guest-layout>