<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gerenciar Planos') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <a href="{{ route('plans.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Novo Plano</a>
                
                <table class="w-full mt-4 border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-2">Nome</th>
                            <th class="text-left p-2">Preço</th>
                            <th class="text-left p-2">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($plans as $plan)
                        <tr class="border-b hover:bg-gray-50">
                            <td class="p-2">{{ $plan->name }}</td>
                            <td class="p-2">R$ {{ number_format($plan->price, 2, ',', '.') }}</td>
                            <td class="p-2">
                                <a href="{{ route('plans.edit', $plan) }}" class="text-orange-500">Editar</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>