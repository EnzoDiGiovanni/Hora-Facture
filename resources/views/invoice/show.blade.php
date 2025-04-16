<!doctype html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <title>Facture #{{ $invoice->id }}</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }

    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 2rem;
    }

    th,
    td {
      border: 1px solid #e5e7eb;
      padding: 0.75rem;
      font-size: 0.875rem;
    }

    tfoot td {
      font-weight: bold;
    }
  </style>
</head>

<body style="padding: 50px;">
  <h1 style="font-size: 1.75rem; font-weight: bold;">Facture : {{ $invoice->name }}</h1>
  <div style="display: flex; justify-content: space-between;">
    <!-- Infos client -->
    <div>
      <p><strong>Date :</strong> {{ $invoice->created_at->format('d/m/Y') }}</p>
      <p><strong>Client :</strong> {{ $invoice->client->bussiness_name }}</p>
      <p><strong>Email :</strong> {{ $invoice->client->email }}</p>
    </div>

    <!-- Infos utilisateur (freelance) -->
    <div style="text-align: right;">
      <p><strong>Émis par :</strong> {{ $invoice->user->name }}</p>
      <p><strong>Email :</strong> {{ $invoice->user->email }}</p>
      @if($invoice->user->address)
      <p><strong>Adresse :</strong> {{ $invoice->user->address }}</p>
    @endif
    </div>
  </div>


  <h2 style="margin-top: 2rem;">Lignes de facture</h2>
  <table>
    <thead>
      <tr>
        <th>Désignation</th>
        <th>Quantité (heures)</th>
        <th>Prix unitaire</th>
        <th>Total ligne</th>
      </tr>
    </thead>
    <tbody>
      @foreach($lines as $line)
      <tr>
      <td>{{ $line->title }}</td>
      <td style="text-align: right;">{{ $line->amount }}</td>
      <td style="text-align: right;">{{ number_format($line->unit_price, 2) }} €</td>
      <td style="text-align: right;">{{ number_format($line->unit_price * $line->amount, 2) }} €</td>
      </tr>
    @endforeach
    </tbody>
    <tfoot>
      <tr>
        <td colspan="3" style="text-align: right;">Total HT</td>
        <td style="text-align: right;">{{ number_format($totalHT, 2) }} €</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right;">TVA</td>
        <td style="text-align: right;">{{ number_format($totalTVA, 2) }} €</td>
      </tr>
      <tr>
        <td colspan="3" style="text-align: right;">Total TTC</td>
        <td style="text-align: right;">{{ number_format($totalTTC, 2) }} €</td>
      </tr>
    </tfoot>
  </table>

  <div style="margin-top: 3rem; font-size: 0.8rem;">
    <p><strong>Coordonnées bancaires</strong></p>
    <p>IBAN : FR76 1234 5678 9012 3456 7890 123</p>
    <p>BIC : CREDITAGRI</p>
    <p>SIRET : 123 456 789 00010 — APE : 6201Z</p>
    <p class="italic" style="margin-top: 1rem;">
      En cas de retard de paiement, des pénalités légales s'appliqueront conformément à l'article L441-10 du Code de
      commerce.
    </p>
  </div>

</body>

</html>