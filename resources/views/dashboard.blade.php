<x-app-layout>

    <x-slot name="header">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">
                🌍 Global Supply Dashboard
            </h2>

            <p class="text-sm text-gray-500 mt-1">
                Smart Global Trade Intelligence Platform
            </p>
        </div>
    </x-slot>

    <div class="py-8">

    <div class="max-w-7xl mx-auto px-6">

        <!-- LIVE STATUS -->
        <div class="bg-gradient-to-r from-indigo-600 to-blue-600 rounded-2xl shadow-lg text-white p-6 mb-8">

            <div class="flex justify-between items-center">

                <div>

                    <h2 class="text-3xl font-bold">
                        🌍 Global Supply Chain Status
                    </h2>

                    <p class="opacity-90 mt-2">
                        Smart Global Trade Intelligence Platform
                    </p>

                </div>

                <div class="text-right">

                    <h3 class="text-xl font-bold text-green-300">
                        🟢 SYSTEM ONLINE
                    </h3>

                    <p id="clock" class="mt-2 text-lg">
                        Loading...
                    </p>

                    <small>
                        Auto Refresh 30 Seconds
                    </small>

                </div>

            </div>

        </div>

        <!-- Search -->

            <!-- Search -->
            <div class="bg-white rounded-2xl shadow-lg p-6 mb-8">

                <form method="GET" action="{{ route('dashboard') }}">

                    <label class="font-semibold text-gray-700 text-lg">
                        🔍 Search Country
                    </label>

                    <div class="flex gap-3 mt-4">

                        <input
                            type="text"
                            name="search"
                            value="{{ $search ?? '' }}"
                            placeholder="Example : Indonesia"
                            class="flex-1 rounded-xl border-gray-300 shadow-sm focus:ring-2 focus:ring-indigo-500">

                        <button
                            class="bg-indigo-600 hover:bg-indigo-700 text-white px-8 rounded-xl font-semibold transition">

                            Search

                        </button>

                    </div>

                </form>

            </div>

            <!-- Statistik -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <div class="bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-5xl">🌍</div>

                    <p class="mt-3 opacity-90">
    Selected Country
</p>

<h3 class="text-3xl font-bold mt-2">
    {{ $country['name'] ?? '-' }}
</h3>

<p class="mt-2 text-sm">
    Current Search Result
</p>

                </div>

                <div class="bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-5xl">💱</div>

                    <p class="mt-3 opacity-90">
    Weather
</p>

<h3 class="text-4xl font-bold mt-2">
    {{ $weather['temperature'] }}°C
</h3>

<p class="mt-2 text-sm">
    Live Temperature
</p>

                </div>

                <div class="bg-gradient-to-r from-purple-500 to-pink-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-5xl">👥</div>

                    <p class="mt-3 opacity-90">
                        Population
                    </p>

                    <h3 class="text-2xl font-bold mt-2">
                        {{ number_format($totalPopulation) }}
                    </h3>

                </div>

                <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-5xl">🌎</div>

                    <p class="mt-3 opacity-90">
                        Regions
                    </p>

                    <h3 class="text-4xl font-bold mt-2">
                        {{ number_format($totalRegions) }}
                    </h3>

                </div>

            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8">

<!-- Economy -->
<div class="bg-white rounded-2xl shadow-lg p-6">

    <h2 class="text-xl font-bold mb-4">
        📈 Economy
    </h2>

    <p class="mb-2">
        GDP Growth :
        <span class="font-bold text-green-600">
            {{ $economy['gdp'] }}
        </span>
    </p>

    <p class="mb-2">
        Inflation :
        <span class="font-bold text-red-500">
            {{ $economy['inflation'] }}
        </span>
    </p>

    <p>
        Export :
        <span class="font-bold text-blue-600">
            {{ $economy['export'] }}
        </span>
    </p>

</div>

<!-- Risk Score -->
<div class="bg-white rounded-2xl shadow-lg p-6">

    <h2 class="text-xl font-bold mb-4">
        ⚠ Risk Score
    </h2>

    <h1 class="text-5xl font-bold text-indigo-600">
        {{ $risk }}%
    </h1>

    @if($risk < 40)

        <p class="text-green-600 font-bold mt-4">
            🟢 LOW RISK
        </p>

    @elseif($risk < 70)

        <p class="text-yellow-500 font-bold mt-4">
            🟡 MEDIUM RISK
        </p>

    @else

        <p class="text-red-600 font-bold mt-4">
            🔴 HIGH RISK
        </p>

    @endif

</div>

<!-- Port Activity -->
<div class="bg-white rounded-2xl shadow-lg p-6">

    <h2 class="text-xl font-bold mb-4">
        🚢 Port Activity
    </h2>

    @foreach($ports as $port)

        <div class="border rounded-xl p-3 mb-3">

            <h3 class="font-bold">
                {{ $port['name'] }}
            </h3>

            <p>
                Status :
                {{ $port['status'] }}
            </p>

            <p>
                Traffic :
                {{ $port['traffic'] }}
            </p>

        </div>

    @endforeach

</div>

</div>
            @if($country)

                <div class="bg-white rounded-2xl shadow-lg mt-8 p-8">

                    <div class="flex items-center gap-6">

                        <img
                            src="{{ $country['flag'] }}"
                            class="w-28 rounded-xl shadow">

                        <div>

                            <h2 class="text-3xl font-bold">
                                {{ $country['name'] }}
                            </h2>

                            <p class="text-gray-500 mt-1">
                                {{ $country['region'] }}
                            </p>

                        </div>

                    </div>

                    <div class="grid grid-cols-2 lg:grid-cols-4 gap-6 mt-8">

                        <div class="bg-gray-50 rounded-xl p-5">

                            <p class="text-gray-500">
                                🏛 Capital
                            </p>

                            <h3 class="font-bold mt-2">
                                {{ $country['capital'] }}
                            </h3>

                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <p class="text-gray-500">
                                💱 Currency
                            </p>

                            <h3 class="font-bold mt-2">
                                {{ $country['currency'] }}
                            </h3>

                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <p class="text-gray-500">
                                👥 Population
                            </p>

                            <h3 class="font-bold mt-2">
                                {{ number_format($country['population']) }}
                            </h3>

                        </div>

                        <div class="bg-gray-50 rounded-xl p-5">

                            <p class="text-gray-500">
                                🗣 Language
                            </p>

                            <h3 class="font-bold mt-2">
                                {{ $country['language'] }}
                            </h3>

                        </div>

                    </div>

                </div>

            @elseif($search)

                <div class="bg-red-100 text-red-700 rounded-xl p-6 mt-8 shadow">

                    <h2 class="text-xl font-bold">

                        Country tidak ditemukan.

                    </h2>

                </div>

            @endif
            @if(count($news))

<div class="bg-white rounded-2xl shadow-lg mt-8 p-8">

    <h2 class="text-2xl font-bold mb-6">
        📰 Latest Economic News
    </h2>

    @foreach($news as $item)

        <div class="border-b pb-5 mb-5">

            @if(isset($item['image']))
                <img src="{{ $item['image'] }}"
                     class="rounded-xl mb-3 w-full h-52 object-cover">
            @endif

            <a href="{{ $item['url'] }}"
               target="_blank"
               class="text-xl font-bold text-blue-600 hover:underline">

                {{ $item['title'] }}

            </a>

            <p class="text-gray-600 mt-2">

                {{ $item['description'] }}

            </p>

            <p class="text-sm text-gray-400 mt-2">

                {{ $item['publishedAt'] }}

            </p>

        </div>

    @endforeach

</div>

@endif

        </div>

    </div>
    <script>

function updateClock(){

    const now = new Date();

    document.getElementById("clock").innerHTML =
        now.toLocaleString('id-ID', {

            weekday: 'long',

            year: 'numeric',

            month: 'long',

            day: 'numeric',

            hour: '2-digit',

            minute: '2-digit',

            second: '2-digit'

        });

}

updateClock();

setInterval(updateClock,1000);

</script>
</x-app-layout>