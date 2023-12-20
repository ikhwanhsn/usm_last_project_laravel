<x-app-layout>
    <x-slot name="header">
            {{ __('Dashboard') }}
    </x-slot>

    <div class="mb-3">
        @include('components/dashboard-glass')
    </div>

    <div class="mb-3">
        @include('components/grafik-penjualan')
    </div>
</x-app-layout>
