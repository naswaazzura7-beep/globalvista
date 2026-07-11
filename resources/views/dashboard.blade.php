<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">
                    🌍 Global Supply Dashboard
                </h2>
                <p class="text-sm text-gray-500 mt-1">
                    Smart Global Trade Intelligence Platform
                </p>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto px-6">

            <!-- Welcome Card -->
            <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg p-8 text-white">

                <h1 class="text-3xl font-bold">
                    Welcome Back, {{ Auth::user()->name }} 👋
                </h1>

                <p class="mt-3 text-blue-100">
                    Monitor countries, currencies, weather, and global trade from one dashboard.
                </p>

                <div class="mt-6">
                    <a href="{{ route('countries.index') }}"
                        class="inline-block bg-white text-blue-700 px-5 py-3 rounded-lg font-semibold hover:bg-gray-100 transition">
                        🌎 Explore Countries
                    </a>
                </div>

            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-4xl">🌍</div>
                    <p class="text-gray-500 mt-3">Countries</p>
                    <h3 class="text-3xl font-bold">195</h3>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-4xl">💱</div>
                    <p class="text-gray-500 mt-3">Currencies</p>
                    <h3 class="text-3xl font-bold">170</h3>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-4xl">🌦️</div>
                    <p class="text-gray-500 mt-3">Weather</p>
                    <h3 class="text-3xl font-bold text-green-600">Stable</h3>
                </div>

                <div class="bg-white rounded-xl shadow p-6">
                    <div class="text-4xl">📈</div>
                    <p class="text-gray-500 mt-3">Trade Score</p>
                    <h3 class="text-3xl font-bold text-blue-600">91%</h3>
                </div>

            </div>

            <!-- Overview -->
            <div class="bg-white rounded-xl shadow mt-8 p-8">

                <h2 class="text-2xl font-bold">
                    🌎 Global Overview
                </h2>

                <p class="mt-4 text-gray-600 leading-7">
                    Global Supply merupakan platform yang menyediakan informasi negara,
                    mata uang, cuaca, berita internasional, dan analisis perdagangan global.
                </p>

            </div>

        </div>
    </div>

</x-app-layout>