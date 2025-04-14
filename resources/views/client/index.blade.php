<x-app-layout>
  <x-slot name="header">
    <div class=" flex items-center justify-between">

      <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        Liste des clients
      </h2>

    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6">
        @forelse ($clients as $client)
      <div class="mb-4 border-b pb-2 flex justify-between items-center">
        <div>
        <p class="dark:text-gray-200"><strong>Nom :</strong> {{ $client->bussiness_name }}</p>
        <p class="dark:text-gray-200"><strong>Email :</strong> {{ $client->email }}</p>
        <p class="dark:text-gray-200"><strong>Ical URL :</strong> {{ $client->ical_url }}</p>
        </div>

        <form action="{{ route('client.destroy', $client->id) }}" method="POST"
        onsubmit="return confirm('Supprimer ce client ?');">
        @csrf
        @method('DELETE')
        <button class="text-red-600">Supprimer</button>
        </form>

      </div>
    @empty
    <p>Aucun client trouvé.</p>
  @endforelse
      </div>
    </div>
  </div>
</x-app-layout>