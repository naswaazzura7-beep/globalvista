<aside class="w-72 bg-gradient-to-b from-blue-950 via-slate-900 to-slate-950 text-white flex flex-col shadow-2xl">

    <!-- Logo -->
    <div class="px-8 py-8 border-b border-slate-700">

        <h1 class="text-3xl font-extrabold text-cyan-400">
            🌐 GlobalVista
        </h1>

        <p class="text-slate-400 mt-2 text-sm">
            Global Trade Intelligence
        </p>

    </div>

    <!-- Menu -->
    <nav class="flex-1 px-6 py-8 space-y-3">

        <p class="text-slate-500 text-xs uppercase tracking-widest mb-3">
            Main Menu
        </p>

        <a href="{{ route('dashboard') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl bg-cyan-500 text-white font-semibold shadow hover:bg-cyan-400 transition">

            🏠 Dashboard

        </a>

        <a href="{{ route('countries.index') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            🌍 Countries

        </a>

        <a href="#"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            🚢 Ports

        </a>

        <a href="{{ route('currency') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            💱 Currency

        </a>

        <a href="{{ route('weather') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            🌦 Weather

        </a>

        <a href="{{ route('news') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            📰 News

        </a>

        <a href="{{ route('analytics') }}"
            class="flex items-center gap-3 px-4 py-3 rounded-xl hover:bg-slate-800 transition">

            📊 Analytics

        </a>

    </nav>

    <!-- User -->
    <div class="border-t border-slate-700 p-6">

        <div class="bg-slate-800 rounded-xl p-4">

            <p class="text-slate-400 text-sm">
                Logged in as
            </p>

            <h3 class="font-bold mt-1">
                {{ Auth::user()->name }}
            </h3>

            <form method="POST" action="{{ route('logout') }}" class="mt-4">
                @csrf

                <button
                    class="w-full bg-red-500 hover:bg-red-600 rounded-lg py-2 font-semibold">

                    Logout

                </button>

            </form>

        </div>

    </div>

</aside>