<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceLine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;


class InvoiceController extends Controller
{



    private function fetchHoursFromIcal($url)
    {
        $response = Http::get($url);

        if ($response->successful()) {
            return $response->json();
        }

        return null;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::where('user_id', Auth::id())->get();
        $clientsInfos = Client::where('user_id', Auth::id())->get();

        return view('invoice.index', [
            'clientsInfos' => $clientsInfos,
            'invoices' => $invoices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $clientsNames = Client::pluck('bussiness_name', 'id');

        return view('invoice.create', ['clientsNames' => $clientsNames]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'payments_terms' => 'required|string|max:255',
            'client_id' => 'required|exists:clients,id',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        $validated['user_id'] = Auth::id();


        $invoice = Invoice::create($validated);


        $client = Client::findOrFail($validated['client_id']);


        $url = 'https://ical.mathieutu.dev/json?url=' . urlencode($client->ical_url);
        $response = Http::get($url);

        $startDate = new \DateTime($invoice->start);
        $endDate = new \DateTime($invoice->end);
        if ($response->successful()) {
            $events = $response->json();



            foreach ($events['events'] ?? [] as $event) {
                if (!isset($event['start'], $event['totalHours'])) continue;


                $eventStart = new \DateTime($event['start']);
                dump('ligne ajoutée');


                if ($eventStart < $startDate || $eventStart > $endDate) {
                    continue;
                }

                InvoiceLine::create([
                    'title' => $event['summary'] ?? 'Prestation',
                    'description' => $event['description'] ?? '',
                    'unit_price' => $client->hourly_rate,
                    'amount' => floatval($event['totalHours']),
                    'vat_rate' => 20,
                    'invoice_id' => $invoice->id,
                ]);
            }
        }

        return redirect()->route('invoice.index')->with('success', 'Facture générée automatiquement à partir du calendrier.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Invoice $invoice)
    {
        abort_if($invoice->user_id !== Auth::id(), 403);

        $invoice->load(['lines', 'client', 'user']);




        $lines = $invoice->lines;

        $totalHT = $lines->sum(fn($line) => $line->unit_price * $line->amount);
        $totalTVA = $lines->sum(fn($line) => ($line->unit_price * $line->amount) * ($line->vat_rate / 100));
        $totalTTC = $totalHT + $totalTVA;

        return view(
            'invoice.show',
            compact(
                'invoice',
                'lines',
                'totalHT',
                'totalTVA',
                'totalTTC'
            )
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('invoice.index')->with('success', 'Facture supprimé.');
    }
}
