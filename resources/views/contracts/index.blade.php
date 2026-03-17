<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Contratos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <div class="mb-4">
                    <a href="{{ route('contracts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        Novo Contrato
                    </a>
                </div>

                <table class="w-full mt-4 border-collapse text-left">
                    <thead>
                        <tr class="border-b bg-gray-50">
                            <th class="p-3">Cliente</th>
                            <th class="p-3">Plano</th>
                            <th class="p-3">Início</th>
                            <th class="p-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($contracts as $contract)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-3">{{ $contract->user->name }}</td>
                            <td class="p-3">{{ $contract->plan->name }}</td>
                            <td class="p-3">{{ $contract->start_date }}</td>
                            <td class="p-3">
                                <span class="px-2 py-1 rounded text-xs {{ $contract->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                    {{ strtoupper($contract->status) }}
                                </span>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="p-3 text-center text-gray-500">Nenhum contrato encontrado.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>