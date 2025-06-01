{{-- resources/views/admin/dashboard.blade.php --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Panel de Administrador
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Bienvenido, Administrador</h1>
                <p class="mt-4 text-gray-700 dark:text-gray-300">Desde aquí puedes gestionar usuarios, materias, grupos y más.</p>
            </div>
        </div>
    </div>
</x-app-layout>
