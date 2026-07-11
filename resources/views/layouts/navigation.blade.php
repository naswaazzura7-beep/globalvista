<div class="w-64 bg-gradient-to-b from-indigo-900 via-slate-900 to-slate-800 text-white h-screen flex flex-col shadow-xl">

    <!-- Logo -->
    <div class="p-6 border-b border-slate-700">

        <h1 class="text-3xl font-bold text-cyan-300">
            🌍 GlobalVista
        </h1>

        <p class="text-sm text-slate-300 mt-2">
            Global Trade Intelligence
        </p>

    </div>

    <!-- Menu -->
    <div class="flex-1 px-4 py-6 space-y-3">

        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            🏠 <span>Dashboard</span>

        </a>

        <a href="{{ route('countries.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            🌍 <span>Countries</span>

        </a>

        <a href="{{ route('currency') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            💱 <span>Currency</span>

        </a>

        <a href="{{ route('weather') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            🌦 <span>Weather</span>

        </a>

        <a href="{{ route('news') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            📰 <span>News</span>

        </a>

        <a href="{{ route('analytics') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-cyan-500 transition">

            📊 <span>Analytics</span>

        </a>

    </div>

    <!-- User -->
    <div class="border-t border-slate-700 p-5">

        <div class="mb-4">

            <p class="font-semibold">
                {{ Auth::user()->name }}
            </p>

            <p class="text-xs text-slate-400">
                {{ Auth::user()->email }}
            </p>

        </div>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 rounded-lg py-2 font-semibold">

                Logout

            </button>

        </form>

    </div>

</div>