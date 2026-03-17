<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index()
    {
        // Eager loading: carrega fatura + contrato + usuário do contrato
        $invoices = Invoice::with(['contract.user'])->get();
        return view('invoices.index', compact('invoices'));
    }
}