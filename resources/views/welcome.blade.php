<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenue</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body
  class="min-h-screen bg-gray-100 dark:bg-gray-900 flex items-center justify-center text-gray-800 dark:text-gray-200">

  <div class="max-w-md w-full mx-4 p-8 bg-white dark:bg-gray-800 rounded-2xl shadow-lg space-y-8">

    <div class="space-y-2 text-center">
      <h1 class="text-3xl font-extrabold  dark:bg-gray-800">Bienvenue sur <br> Hora Facture 👋</h1>
      <p class="text-gray-600 dark:text-gray-400 text-sm">
        Connectez-vous ou créez votre compte pour commencer.
      </p>
    </div>

    <div class="flex flex-col gap-4">
      <a href="{{ route('login') }}"
        class="inline-flex items-center justify-center w-full px-4 py-2 bg-gray-800 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        Se connecter
      </a>

      <a href="{{ route('register') }}"
        class="inline-flex items-center justify-center w-full px-4 py-2 bg-gray-600 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
        S’inscrire
      </a>
    </div>

  </div>

</body>

</html>