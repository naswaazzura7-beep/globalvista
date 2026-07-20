<x-app-layout>

<div class="p-8">

    <div class="max-w-4xl mx-auto">

        <div class="bg-white rounded-3xl shadow-xl p-8">

            <h1 class="text-4xl font-bold text-cyan-700 mb-2">
                🌦 Weather Information
            </h1>

            <p class="text-gray-500 mb-8">
                Real-time weather using Open-Meteo API
            </p>

            <form method="GET" class="flex gap-4 mb-8">

                <input
                    type="text"
                    name="search"
                    value="{{ $search }}"
                    placeholder="Search country (Example: Indonesia)"
                    class="flex-1 border rounded-xl px-5 py-3 focus:ring-2 focus:ring-cyan-500">

                <button
                    class="bg-cyan-600 hover:bg-cyan-700 text-white px-8 rounded-xl font-semibold">

                    Search

                </button>

            </form>

            @if($country && $weather)

            <div class="grid md:grid-cols-2 gap-6">

                <div class="bg-cyan-50 rounded-2xl p-6">

                    <div class="flex items-center gap-4 mb-5">

                        <img src="{{ $country->flag }}"
                             class="w-20 rounded shadow">

                        <div>

                            <h2 class="text-3xl font-bold">
                                {{ $country->name }}
                            </h2>

                            <p class="text-gray-600">
                                {{ $country->capital }}
                            </p>

                        </div>

                    </div>

                    <div class="space-y-3">

                        <p>
                            🌍 <b>Region :</b> {{ $country->region }}
                        </p>

                        <p>
                            👥 <b>Population :</b>
                            {{ number_format($country->population) }}
                        </p>

                    </div>

                </div>

                <div class="bg-indigo-50 rounded-2xl p-6">

                    <h3 class="text-2xl font-bold mb-5">
                        Live Weather
                    </h3>

                    <div class="space-y-4">

                        <p class="text-xl">
                            🌡 Temperature :
                            <b>{{ $weather['temperature_2m'] }} °C</b>
                        </p>

                        <p class="text-xl">
                            💧 Humidity :
                            <b>{{ $weather['relative_humidity_2m'] }} %</b>
                        </p>

                        <p class="text-xl">
                            💨 Wind Speed :
                            <b>{{ $weather['wind_speed_10m'] }} km/h</b>
                        </p>

                        <p class="text-xl">
                            ☁ Weather Code :
                            <b>{{ $weather['weather_code'] }}</b>
                        </p>

                    </div>

                </div>

            </div>

            @elseif($search)

                <div class="bg-red-100 text-red-700 p-5 rounded-xl">

                    Country not found or weather unavailable.

                </div>

            @else

                <div class="text-center py-16">

                    <div class="text-7xl mb-5">
                        🌎
                    </div>

                    <h2 class="text-2xl font-bold mb-3">
                        Search Any Country
                    </h2>

                    <p class="text-gray-500">
                        Example: Indonesia, Japan, Malaysia, Singapore, Australia
                    </p>

                </div>

            @endif

        </div>

    </div>

</div>

</x-app-layout>