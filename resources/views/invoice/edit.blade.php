<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">Modifier la facture</h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg p-6">
        <form method="POST" action="{{ route('invoice.update', $invoice->id) }}">
          @csrf
          @method('PUT')

          <!-- Nom -->
          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2" for="name">
              Nom de la facture
            </label>
            <input id="name" name="name" type="text" value="{{ old('name', $invoice->name) }}" required
              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
          </div>



          <!-- Date de début -->
          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2" for="start">
              Date de début
            </label>
            <input id="start" name="start" type="date" value="{{ old('start', $invoice->start) }}" required
              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
          </div>

          <!-- Date de fin -->
          <div class="mb-4">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2" for="end">
              Date de fin
            </label>
            <input id="end" name="end" type="date" value="{{ old('end', $invoice->end) }}" required
              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
          </div>

          <!-- Client lié -->
          <div class="mb-6">
            <label class="block text-gray-700 dark:text-gray-300 font-bold mb-2" for="client_id">
              Client
            </label>
            <select id="client_id" name="client_id" required
              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm focus:ring-indigo-500 dark:bg-gray-800 dark:text-white">
              @foreach($clients as $client)
          <option value="{{ $client->id }}" {{ $invoice->client_id == $client->id ? 'selected' : '' }}>
          {{ $client->bussiness_name }}
          </option>
        @endforeach
            </select>
          </div>

          <!-- Bouton -->
          <div class="flex justify-end">
            <button type="submit"
              class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
              Mettre à jour
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
</x-app-layout>