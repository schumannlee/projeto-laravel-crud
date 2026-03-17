<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use App\Models\User;
use App\Models\Plan;
use App\Models\Invoice;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contracts = Contract::with(['user', 'plan'])->get();
        return view('contracts.index', compact('contracts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $plans = Plan::all();
        return view('contracts.create', compact('users', 'plans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
            'start_date' => 'required|date',
        ]);

        // 1. Cria o Contrato
        $contract = Contract::create($request->all());

        // 2. Gera a Fatura Automática baseada no preço do plano
        $plan = Plan::find($request->plan_id);
        Invoice::create([
            'contract_id' => $contract->id,
            'amount' => $plan->price,
            'due_date' => now()->addDays(10), // Vencimento em 10 dias
            'status' => 'pending'
        ]);

        return redirect()->route('contracts.index')->with('success', 'Contrato e Fatura gerados!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}