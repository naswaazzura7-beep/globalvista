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
    <div class="flex-1 px-4 py-5 space-y-2 overflow-y-auto">


        <a href="{{ route('dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('dashboard') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            🏠 <span>Dashboard</span>
        </a>


        <a href="{{ route('countries.index') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('countries.*') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            🌍 <span>Countries</span>
        </a>


        <a href="{{ route('currency') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('currency') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            💱 <span>Currency</span>
        </a>


        <a href="{{ route('weather') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('weather') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            🌦 <span>Weather</span>
        </a>


        <a href="{{ route('news') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('news') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            📰 <span>News</span>
        </a>


        <a href="{{ route('ports') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('ports') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            🚢 <span>Ports</span>
        </a>


        <a href="{{ route('economy') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('economy') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            💹 <span>Economy</span>
        </a>


        <a href="{{ route('analytics') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('analytics') ? 'bg-cyan-500 text-white font-semibold shadow' : 'hover:bg-cyan-500' }}">
            📊 <span>Analytics</span>
        </a>



        {{-- KHUSUS ADMIN --}}
        @if(Auth::user()->role == 'admin')

        <a href="{{ route('admin.dashboard') }}"
           class="flex items-center gap-3 px-4 py-3 rounded-xl transition {{ request()->routeIs('admin.dashboard') ? 'bg-red-500 text-white font-semibold shadow' : 'hover:bg-red-500' }}">

            👑 <span>Admin Dashboard</span>

        </a>

        @endif


    </div>



    <!-- User -->
    <div class="border-t border-slate-700 p-4">


        <div class="mb-3">

            <p class="font-semibold text-sm">
                {{ Auth::user()->name }}
            </p>

            <p class="text-xs text-slate-400 truncate">
                {{ Auth::user()->email }}
            </p>

            <p class="text-xs text-cyan-300 mt-1">
                Role: {{ Auth::user()->role }}
            </p>

        </div>



        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button
                class="w-full bg-red-500 hover:bg-red-600 transition rounded-lg py-2 text-sm font-semibold">

                🚪 Logout

            </button>

        </form>


    </div>


</div>