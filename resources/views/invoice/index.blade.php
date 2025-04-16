<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between">
      <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">Liste des factures</h2>

      <a href="{{ route('invoice.create') }}"
        class="inline-block bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
        + Nouvelle facture
      </a>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg p-6">
        @forelse ($invoices as $invoice)
      <div
        class="mb-6 p-4 border border-gray-300 dark:border-gray-700 rounded-lg bg-gray-50 dark:bg-gray-800 shadow-sm flex justify-between items-start">
        <div class="space-y-1 break-words">
        <a href="{{ route('invoice.show', $invoice->id) }}"
          class="text-lg text-teal-600 dark:text-teal-400 font-semibold hover:underline">
          {{ $invoice->name }}
        </a>
        <p class="text-sm text-gray-700 dark:text-gray-300">
          <strong>Date :</strong> {{ $invoice->created_at->format('d/m/Y') }}
        </p>
        <p class="text-sm text-gray-700 dark:text-gray-300">
          <strong>Client :</strong> {{ $invoice->client->bussiness_name ?? '—' }}
        </p>
        </div>

        <form action="{{ route('invoice.destroy', $invoice->id) }}" method="POST"
        onsubmit="return confirm('Supprimer cette facture ?');">
        @csrf
        @method('DELETE')
        <button class="text-sm text-red-600 hover:text-red-700 hover:underline font-medium">
          Supprimer
        </button>
        </form>
      </div>
    @empty
    <p class="text-gray-600 dark:text-gray-300">Aucune facture trouvée.</p>
  @endforelse
      </div>
    </div>
  </div>
</x-app-layout>