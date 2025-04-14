<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Bienvenue</title>
  @vite(['resources/css/app.css', 'resources/js/app.js']) {{-- Si Breeze est installé --}}
</head>

<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-white min-h-screen flex items-center justify-center">
  <div class="max-w-2xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-xl shadow-md space-y-6">

    <header>
      <h1 class="text-3xl font-bold text-center">Bienvenue</h1>
      <p class="text-center text-sm text-gray-600 dark:text-gray-400">
        Connectez-vous ou créez un compte pour commencer.
      </p>
    </header>

    <div class="flex justify-center gap-4">
      <a href="{{ route('login') }}"
        class="inline-block px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition">
        Se connecter
      </a>

      <a href="{{ route('register') }}"
        class="inline-block px-6 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium rounded-md transition dark:bg-gray-700 dark:text-white dark:hover:bg-gray-600">
        S’inscrire
      </a>
    </div>

  </div>
</body>

</html>#