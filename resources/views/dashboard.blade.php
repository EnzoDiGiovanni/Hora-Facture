<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between animate-fade-in">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Bonjour {{ Auth::user()->name }} 👋
            </h2>
            <div class="flex gap-2">
                <a href="{{ route('client.create') }}"
                    class="inline-block bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
                    + Nouveau client
                </a>
                <a href="{{ route('invoice.create') }}"
                    class="inline-block bg-teal-600 hover:bg-teal-700 text-white text-sm font-medium px-4 py-2 rounded-lg shadow transition">
                    + Nouvelle facture
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12 animate-fade-in">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Titre d'accueil -->
            <div class="text-center animate-slide-in">
                <h1 class="text-3xl font-bold text-gray-800 dark:text-white">Bienvenue sur Hora Facture 🚀</h1>
                <p class="text-gray-600 dark:text-gray-400 mt-2">Gérez vos factures et clients en toute simplicité.</p>
            </div>

            <!-- Statistiques -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6  animate-slide-in">
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow text-center">
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $clients->count() }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Clients enregistrés</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow text-center">
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">{{ $invoices->count() }}</p>
                    <p class="text-gray-600 dark:text-gray-400">Factures créées</p>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow text-center">
                    <p class="text-2xl font-bold text-gray-800 dark:text-white">
                        {{ $invoices->flatMap->lines->sum('amount') }}h
                    </p>
                    <p class="text-gray-600 dark:text-gray-400">Heures totales facturées</p>
                </div>
            </div>

            <!-- Dernières factures -->
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow animate-slide-in">
                <h2 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Dernières factures</h2>
                @forelse($invoices->sortByDesc('created_at')->take(5) as $invoice)
                    <div class="flex justify-between items-center border-b border-gray-200 dark:border-gray-700 py-2">
                        <span class="text-gray-700 dark:text-gray-300">{{ $invoice->name }}</span>
                        <span
                            class="text-sm text-gray-500 dark:text-gray-400">{{ $invoice->created_at->format('d/m/Y') }}</span>
                    </div>
                @empty
                    <p class="text-gray-600 dark:text-gray-400">Aucune facture récente.</p>
                @endforelse
            </div>

        </div>
    </div>
</x-app-layout>