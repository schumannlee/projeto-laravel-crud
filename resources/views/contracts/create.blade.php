<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 bg-white p-6 shadow sm:rounded-lg">
            <form action="{{ route('contracts.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <x-input-label value="Selecionar Cliente" />
                    <select name="user_id" class="w-full border-gray-300 rounded-md">
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <x-input-label value="Selecionar Plano" />
                    <select name="plan_id" class="w-full border-gray-300 rounded-md">
                        @foreach($plans as $plan)
                            <option value="{{ $plan->id }}">{{ $plan->name }} (R$ {{ $plan->price }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <x-input-label value="Data de Início" />
                    <x-text-input type="date" name="start_date" class="w-full" required />
                </div>
                <x-primary-button>Gerar Contrato</x-primary-button>
            </form>
        </div>
    </div>
</x-app-layout>