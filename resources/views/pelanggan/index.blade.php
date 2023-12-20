<x-app-layout>
    <x-slot name="header">
            {{ __('Pelanggan') }}
    </x-slot>

    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        <div class="p-6 border-b border-gray-200">
            {{ __('Ini adalah data pelanggan') }}
        </div>
    </div>
</x-app-layout>
