@extends('index')

@section('content')
    <!-- begin: Balance Chart -->
    <div class="w-[90%] lg:w-[60%] mx-auto bg-white shadow border border-gray-100 rounded">
        <div class="w-full flex justify-between items-center p-6">
            <h2 class="text-gray-500 font-bold text-xs">Balanço</h2>
            <div class="">
                <button class="text-xs font-medium text-white bg-blue-500 rounded transition-color duration-300 hover:bg-blue-500 px-4 py-2">
                    Nova Fatura
                </button>
            </div>
        </div>
        <div class="relative w-full p-2">
            <canvas id="balanceChart"></canvas>
        </div>
    </div>
    <!-- end: Balance Chart -->

    <!-- begin: List last invoices -->
    <div class="space-y-5 w-[90%] lg:w-[60%] mx-auto">
        <div class="flex justify-between">
            <h2 class="font-bold text-gray-400">Últimos lançamentos</h2>
        </div>

        @foreach ($invoices as $invoice)
            @php
                $invoice->color = $invoice->kind === 'income' ? 'green' : 'red';
            @endphp
            @include('components.card-invoice', compact('invoice'))
        @endforeach
    </div>
    <!-- end: list last invoices -->
@endsection

@section('scripts')
    <script src="@asset('/js/scripts.js')"></script>
@endsection
