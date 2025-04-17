<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">Liste des clients</h2>

      <a href="{{ route('client.create') }}"
        class="inline-block bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
        + Nouveau client
      </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 ">
      <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg p-6">
        @forelse ($clients as $client)
      <div
        class="mb-6 p-4 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-sm flex justify-between items-center gap-10">
        <div class="space-y-1 break-words">
        <p class="text-lg text-gray-900 dark:text-gray-100 font-semibold break-all">{{ $client->bussiness_name }}
        </p>
        <p class="text-sm text-gray-700 dark:text-gray-300 break-all"><strong>Email :</strong> {{ $client->email }}
        </p>
        <p class="text-sm text-gray-700 dark:text-gray-300 break-all"><strong>Ical URL :</strong>
          {{ $client->ical_url }}</p>
        </div>

        <div>

        <a href="{{ route('client.edit', $client->id) }}"
          class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
          Modifier
        </a>

        <form action="{{ route('client.destroy', $client->id) }}" method="POST"
          onsubmit="return confirm('Supprimer ce client ?');" class="inline-block">
          @csrf
          @method('DELETE')
          <button
          class="inline-flex items-center px-4 py-2 bg-red-600 dark:bg-red-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-red-700 dark:hover:bg-red-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition">
          Supprimer
          </button>
        </form>
        </form>
        </div>
      </div>
    @empty
    <p class="text-gray-600 dark:text-gray-300">Aucun client trouvé.</p>
  @endforelse
      </div>
    </div>
  </div>
</x-app-layout>