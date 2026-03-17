<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Novo Plano') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('plans.store') }}" method="POST">
                    @csrf
                    <div class="mb-4">
                        <x-input-label for="name" :value="__('Nome do Plano')" />
                        <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="price" :value="__('Preço (ex: 99.90)')" />
                        <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" required />
                    </div>

                    <div class="mb-4">
                        <x-input-label for="description" :value="__('Descrição/Serviços')" />
                        <textarea id="description" name="description" class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mt-1 block w-full"></textarea>
                    </div>

                    <x-primary-button>{{ __('Salvar Plano') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>