<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Financeiro - Faturas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b bg-gray-50 text-gray-600 uppercase text-xs">
                            <th class="p-4">Cód. Fatura</th>
                            <th class="p-4">Cliente</th>
                            <th class="p-4">Vencimento</th>
                            <th class="p-4">Valor</th>
                            <th class="p-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($invoices as $invoice)
                        <tr class="border-b hover:bg-gray-50 transition">
                            <td class="p-4 font-mono text-sm text-blue-600">#INV-{{ $invoice->id }}</td>
                            <td class="p-4 text-gray-700">{{ $invoice->contract->user->name }}</td>
                            <td class="p-4 text-gray-600">{{ \Carbon\Carbon::parse($invoice->due_date)->format('d/m/Y') }}</td>
                            <td class="p-4 font-bold">R$ {{ number_format($invoice->amount, 2, ',', '.') }}</td>
                            <td class="p-4">
                                <span class="px-2 py-1 rounded-full text-xs font-semibold {{ $invoice->status == 'paid' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                                    {{ strtoupper($invoice->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="p-6 text-center text-gray-500">Nenhuma fatura pendente.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>