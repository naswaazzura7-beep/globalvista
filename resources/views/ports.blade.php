<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            🚢 Global Ports
        </h2>
    </x-slot>

    <!-- Leaflet CSS -->
    <link rel="stylesheet"
        href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Search -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-6">

                <form method="GET">

                    <input
                        type="text"
                        name="search"
                        value="{{ $search }}"
                        placeholder="🔍 Search Country..."
                        class="w-full md:w-96 rounded-xl border border-gray-300 px-5 py-3 focus:ring-2 focus:ring-blue-500">

                </form>

            </div>

            @if($country)

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">

                <!-- LEFT -->
                <div>

                    <!-- Country Card -->
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-700 rounded-2xl shadow-lg text-white p-6">

                        <div class="flex items-center gap-5">

                            <img
                                src="{{ $country->flag }}"
                                class="w-20 rounded-lg shadow-lg">

                            <div>

                                <h2 class="text-3xl font-bold">
                                    {{ $country->name }}
                                </h2>

                                <p class="text-blue-100 text-lg">
                                    ISO Code : {{ $country->iso3 }}
                                </p>

                            </div>

                        </div>

                    </div>

                    <!-- Statistics -->
                    <div class="grid grid-cols-2 gap-4 mt-6">

                        <div class="bg-white rounded-xl shadow p-5">

                            <p class="text-gray-500 text-sm">
                                🏛 Capital
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                {{ $country->capital }}
                            </h3>

                        </div>

                        <div class="bg-white rounded-xl shadow p-5">

                            <p class="text-gray-500 text-sm">
                                🌍 Region
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                {{ $country->region }}
                            </h3>

                        </div>

                        <div class="bg-white rounded-xl shadow p-5">

                            <p class="text-gray-500 text-sm">
                                👥 Population
                            </p>

                            <h3 class="text-xl font-bold mt-1">
                                {{ number_format($country->population) }}
                            </h3>

                        </div>

                        <div class="bg-white rounded-xl shadow p-5">

                            <p class="text-gray-500 text-sm">
                                🚢 Total Ports
                            </p>

                            <h3 class="text-xl font-bold mt-1 text-blue-600">
                                {{ count($ports) }}
                            </h3>

                        </div>

                    </div>

                    <!-- Ports -->
                    <div class="mt-8">

                        <h3 class="text-2xl font-bold text-blue-700 mb-4">
                            🚢 Main Ports
                        </h3>

                        @forelse($ports as $port)

                            <div class="bg-white rounded-xl shadow-md p-5 mb-4 hover:shadow-xl transition">

                                <div class="flex justify-between items-center">

                                    <div>

                                        <h4 class="text-lg font-bold">
                                            {{ $port['name'] }}
                                        </h4>

                                        <p class="text-gray-500 mt-1">

                                            📍 Latitude :
                                            {{ $port['lat'] }}

                                            <br>

                                            📍 Longitude :
                                            {{ $port['lng'] }}

                                        </p>

                                    </div>

                                    <span class="bg-green-100 text-green-700 px-4 py-2 rounded-full font-semibold">

                                        Active

                                    </span>

                                </div>

                            </div>

                        @empty

                            <div class="bg-red-100 text-red-600 rounded-xl p-5">

                                🚫 No port data available.

                            </div>

                        @endforelse

                    </div>

                </div>

                <!-- RIGHT -->
                <div>

                    <div class="bg-white rounded-2xl shadow-lg p-4">

                        <h3 class="text-2xl font-bold text-blue-700 mb-4">

                            🗺️ Port Location Map

                        </h3>

                        <div
                            id="map"
                            class="rounded-xl"
                            style="height:600px;">
                        </div>

                    </div>

                </div>

            </div>

            @endif

        </div>

    </div>

    <!-- Leaflet -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>

    @if($country)

    <script>

        let map = L.map('map').setView([
            {{ $country->latitude }},
            {{ $country->longitude }}
        ],5);

        L.tileLayer(
            'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png',
            {
                attribution:'© OpenStreetMap'
            }
        ).addTo(map);

        @foreach($ports as $port)

        L.marker([
            {{ $port['lat'] }},
            {{ $port['lng'] }}
        ])
        .addTo(map)
        .bindPopup(`
            <b>{{ $port['name'] }}</b>
            <br>
            {{ $country->name }}
        `);

        @endforeach

    </script>

    @endif

</x-app-layout>