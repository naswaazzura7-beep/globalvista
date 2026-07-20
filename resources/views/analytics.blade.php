<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-2xl text-gray-800">
            📊 Global Analytics Dashboard
        </h2>
    </x-slot>

    <div class="py-8">

        <div class="max-w-7xl mx-auto px-6">

            <!-- Summary Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">

                <div class="bg-blue-600 text-white rounded-2xl shadow-lg p-6">

                    <p class="text-sm opacity-80">
                        🌍 Countries
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ $totalCountries }}
                    </h2>

                </div>

                <div class="bg-green-600 text-white rounded-2xl shadow-lg p-6">

                    <p class="text-sm opacity-80">
                        👥 Population
                    </p>

                    <h2 class="text-2xl font-bold mt-2">
                        {{ number_format($totalPopulation) }}
                    </h2>

                </div>

                <div class="bg-purple-600 text-white rounded-2xl shadow-lg p-6">

                    <p class="text-sm opacity-80">
                        🚢 Port Countries
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ $totalPorts }}
                    </h2>

                </div>

                <div class="bg-red-600 text-white rounded-2xl shadow-lg p-6">

                    <p class="text-sm opacity-80">
                        🚨 High Risk
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ $highRisk }}
                    </h2>

                </div>

            </div>

            <!-- Chart + Region -->

            <div class="grid lg:grid-cols-2 gap-8 mb-8">

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-xl font-bold mb-6">
                        🌍 Countries by Region
                    </h3>

                    <canvas id="regionChart"></canvas>

                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-xl font-bold mb-6">
                        🌎 Region Statistics
                    </h3>

                    <table class="w-full">

                        <tr class="border-b">

                            <td class="py-3">Asia</td>
                            <td class="font-bold text-right">{{ $asia }}</td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-3">Europe</td>
                            <td class="font-bold text-right">{{ $europe }}</td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-3">Africa</td>
                            <td class="font-bold text-right">{{ $africa }}</td>

                        </tr>

                        <tr class="border-b">

                            <td class="py-3">Americas</td>
                            <td class="font-bold text-right">{{ $america }}</td>

                        </tr>

                        <tr>

                            <td class="py-3">Oceania</td>
                            <td class="font-bold text-right">{{ $oceania }}</td>

                        </tr>

                    </table>

                </div>

            </div>

            <!-- Top Population -->

            <div class="grid lg:grid-cols-2 gap-8">

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-xl font-bold mb-5">
                        🏆 Top Population
                    </h3>

                    @foreach($topPopulation as $country)

                        <div class="flex justify-between border-b py-3">

                            <span>{{ $country->name }}</span>

                            <span class="font-bold">

                                {{ number_format($country->population) }}

                            </span>

                        </div>

                    @endforeach

                </div>

                <div class="bg-white rounded-2xl shadow-lg p-6">

                    <h3 class="text-xl font-bold mb-5">

                        🚨 Highest Risk Countries

                    </h3>

                    @foreach($topRisk as $country)

                        <div class="flex justify-between border-b py-3">

                            <span>{{ $country->name }}</span>

                            <span class="font-bold text-red-600">

                                {{ $country->risk_score }}

                            </span>

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>

        new Chart(document.getElementById('regionChart'),{

            type:'doughnut',

            data:{

                labels:[
                    'Asia',
                    'Europe',
                    'Africa',
                    'Americas',
                    'Oceania'
                ],

                datasets:[{

                    data:[
                        {{ $asia }},
                        {{ $europe }},
                        {{ $africa }},
                        {{ $america }},
                        {{ $oceania }}
                    ]

                }]

            },

            options:{
                responsive:true
            }

        });

    </script>

</x-app-layout>