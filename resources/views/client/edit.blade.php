<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">Modifier le client</h2>
  </x-slot>

  <div class="py-10">
    <div class="max-w-xl mx-auto bg-white dark:bg-gray-900 rounded-lg p-6 shadow">
      <form action="{{ route('client.update', $client->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
          <label class="block text-gray-700 dark:text-gray-200">Nom de l'entreprise</label>
          <input type="text" name="bussiness_name" value="{{ old('bussiness_name', $client->bussiness_name) }}"
            class="w-full mt-1 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
          <label class="block text-gray-700 dark:text-gray-200">Email</label>
          <input type="email" name="email" value="{{ old('email', $client->email) }}"
            class="w-full mt-1 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
          <label class="block text-gray-700 dark:text-gray-200">URL iCal</label>
          <input type="text" name="ical_url" value="{{ old('ical_url', $client->ical_url) }}"
            class="w-full mt-1 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white" />
        </div>

        <div>
          <label class="block text-gray-700 dark:text-gray-200">Taux horaire (€)</label>
          <input type="number" step="0.01" name="hourly_rate" value="{{ old('hourly_rate', $client->hourly_rate) }}"
            class="w-full mt-1 rounded border-gray-300 dark:border-gray-700 dark:bg-gray-800 dark:text-white" />
        </div>

        <div class="flex justify-end">
          <x-primary-button>Mettre à jour</x-primary-button>
        </div>
      </form>
    </div>
  </div>
</x-app-layout>