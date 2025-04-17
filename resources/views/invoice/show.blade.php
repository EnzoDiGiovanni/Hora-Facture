<x-app-layout>
  <x-slot name="header">
    <div class="flex items-center justify-between print:hidden">
      <h2 class="font-semibold text-2xl text-gray-800 dark:text-white">Facture : {{ $invoice->name }}</h2>
      <p class="text-sm text-gray-600 dark:text-gray-400">Période facturée : du {{ $invoice->start }} au
        {{ $invoice->end }}</p>
    </div>
  </x-slot>

  <div class="py-12">
    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

      <!-- Modifier & Imprimer -->
      <div class="flex justify-end flex-col items-end gap-3 print:hidden mb-10">
        <a href="{{ route('invoice.edit', $invoice->id) }}"
          class="inline-flex items-center px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition">
          Modifier
        </a>
        <button
          class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-400 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-900 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-indigo-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition"
          onclick="window.print()">
          Imprimer
        </button>
      </div>

      <div class="bg-white dark:bg-gray-900 shadow sm:rounded-lg p-6 space-y-8">

        <!-- Infos de facture -->
        <div class="flex justify-between flex-col gap-5">
          <div class="mb-10">
            <h3 class="font-semibold text-2xl text-gray-800 dark:text-white">Facture : {{ $invoice->name }}</h3>
            <p class="text-gray-600 dark:text-gray-400">Période facturée : du {{ $invoice->start }} au
              {{ $invoice->end }}</p>
            <p class="font-semibold text-sm text-gray-800 dark:text-white">
              Facture numéro : {{ $invoice->created_at->format('d-m-Y') }}-{{ $invoice->id }}-{{ $invoice->user->id }}
            </p>
          </div>

          <div class="text-gray-800 dark:text-gray-200 space-y-1">
            <p><strong>Date :</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
            <p><strong>Client :</strong> {{ $invoice->client->bussiness_name }}</p>
            <p><strong>Email :</strong> {{ $invoice->client->email }}</p>
          </div>

          <div class="text-right text-gray-800 dark:text-gray-200 space-y-1">
            <p><strong>Émis par :</strong> {{ $invoice->user->name }}</p>
            <p><strong>Email :</strong> {{ $invoice->user->email }}</p>
            @if($invoice->user->address)
        <p><strong>Adresse :</strong> {{ $invoice->user->address }}</p>
      @endif
          </div>
        </div>

        <!-- Lignes de facture -->
        <div>
          <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-4">Lignes de facture</h2>
          <p class="text-sm text-gray-700 dark:text-gray-400 mb-4">
            Nombre total d'heures : {{ $lines->sum('amount') }} heures
          </p>
          <div class="overflow-x-auto">
            <table class="min-w-full bg-white dark:bg-gray-800 rounded-lg overflow-hidden">
              <thead class="bg-gray-200 dark:bg-gray-700">
                <tr>
                  <th class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider">Désignation</th>
                  <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Quantité (heures)</th>
                  <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Prix unitaire (€)</th>
                  <th class="px-6 py-3 text-right text-xs font-medium uppercase tracking-wider">Total ligne (€)</th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($lines as $line)
          <tr>
            <td class="px-6 py-4 text-sm">{{ $line->title }}</td>
            <td class="px-6 py-4 text-sm text-right">{{ $line->amount }}</td>
            <td class="px-6 py-4 text-sm text-right">{{ number_format($line->unit_price, 2) }} €</td>
            <td class="px-6 py-4 text-sm text-right">{{ number_format($line->unit_price * $line->amount, 2) }} €
            </td>
            <td class="print:hidden px-6 py-4 text-sm text-right">
            <form action="{{ route('invoiceLine.destroy', $line->id) }}" method="POST"
              onsubmit="return confirm('Supprimer cette ligne ?');">
              @csrf
              @method('DELETE')
              <button class="text-sm hover:bg-gray-700 rounded-full p-3 font-medium">🗑️</button>
            </form>
            </td>
          </tr>
        @endforeach
              </tbody>
              <tfoot class="bg-gray-100 dark:bg-gray-700">
                <tr>
                  <td colspan="3" class="px-6 py-3 text-right font-semibold">Total HT</td>
                  <td class="px-6 py-3 text-right font-semibold">{{ number_format($totalHT, 2) }} €</td>
                </tr>
                <tr>
                  <td colspan="3" class="px-6 py-3 text-right font-semibold">TVA</td>
                  <td class="px-6 py-3 text-right font-semibold">{{ number_format($totalTVA, 2) }} €</td>
                </tr>
                <tr>
                  <td colspan="3" class="px-6 py-3 text-right font-semibold">Total TTC</td>
                  <td class="px-6 py-3 text-right font-semibold">{{ number_format($totalTTC, 2) }} €</td>
                </tr>
              </tfoot>
            </table>
          </div>
        </div>

        <!-- Notes complémentaires -->
        @if($invoice->notes)
      <div
        class="border-t border-gray-300 dark:border-gray-700 pt-6 mt-6 text-sm text-gray-700 dark:text-gray-300 space-y-2">
        <p class="font-semibold text-gray-800 dark:text-gray-100">Notes complémentaires :</p>
        <p>{{ $invoice->notes }}</p>
      </div>
    @endif

      </div>
    </div>
  </div>
</x-app-layout>