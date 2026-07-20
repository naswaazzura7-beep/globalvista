<x-app-layout>

    <x-slot name="header">

        <h2 class="font-bold text-3xl text-gray-800">
            👑 Admin Dashboard
        </h2>

    </x-slot>


    <div class="py-10">

        <div class="max-w-7xl mx-auto px-6">


            <!-- Welcome -->
            <div class="bg-gradient-to-r from-indigo-700 to-purple-700 text-white rounded-2xl shadow-xl p-8">

                <h1 class="text-4xl font-bold">
                    Welcome Admin 👋
                </h1>

                <p class="mt-3 text-indigo-100">
                    Manage GlobalVista system and monitor global trade data.
                </p>

            </div>



            <!-- Statistics -->

            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mt-8">


                <!-- Countries -->
                <div class="bg-blue-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-4xl">
                        🌍
                    </div>

                    <p class="mt-3">
                        Total Countries
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ \App\Models\Country::count() }}
                    </h2>

                </div>



                <!-- Ports -->
                <div class="bg-cyan-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-4xl">
                        🚢
                    </div>

                    <p class="mt-3">
                        Total Ports
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ $totalPorts ?? 0 }}
                    </h2>

                </div>




                <!-- Users -->
                <div class="bg-green-600 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-4xl">
                        👤
                    </div>

                    <p class="mt-3">
                        Total Users
                    </p>

                    <h2 class="text-4xl font-bold mt-2">
                        {{ \App\Models\User::count() }}
                    </h2>

                </div>




                <!-- GDP -->
                <div class="bg-yellow-500 text-white rounded-2xl shadow-lg p-6">

                    <div class="text-4xl">
                        💰
                    </div>

                    <p class="mt-3">
                        World GDP
                    </p>

                    <h2 class="text-3xl font-bold mt-2">
                        {{ $worldGDP ?? '-' }} T$
                    </h2>

                </div>


            </div>





            <!-- Quick Action -->

            <div class="bg-white rounded-2xl shadow-lg mt-8 p-8">


                <h2 class="text-2xl font-bold mb-5">
                    ⚡ Quick Actions
                </h2>



                <div class="grid md:grid-cols-3 gap-5">


                    <a href="{{ route('countries.index') }}"
                       class="bg-blue-100 hover:bg-blue-200 rounded-xl p-5 transition">

                        🌍

                        <a href="{{ route('countries.admin') }}"
class="bg-blue-100 hover:bg-blue-200 rounded-xl p-5 transition">

    🌍

    <h3 class="font-bold text-lg mt-2">
        Manage Countries
    </h3>

    <p class="text-gray-600 text-sm">
        Tambah, edit, hapus data negara
    </p>

</a>




<a href="{{ route('ports.index') }}"
   class="bg-cyan-100 hover:bg-cyan-200 rounded-xl p-5 transition">

    🚢

    <h3 class="font-bold text-lg mt-2">
        Manage Ports
    </h3>

    <p class="text-gray-600 text-sm">
        Tambah, edit, hapus data port
    </p>

</a>




<a href="{{ route('users.index') }}"
class="bg-green-100 hover:bg-green-200 rounded-xl p-5 transition">

    👤

    <h3 class="font-bold text-lg mt-2">
        User Management
    </h3>

    <p class="text-gray-600 text-sm">
        Control user access
    </p>

</a>

                </div>


            </div>





            <!-- System Status -->

            <div class="bg-white rounded-2xl shadow-lg mt-8 p-8">


                <h2 class="text-2xl font-bold mb-5">
                    ⚙️ System Status
                </h2>


                <div class="space-y-3">


                    <div class="flex justify-between bg-gray-100 p-4 rounded-xl">

                        <span>
                            Database
                        </span>

                        <span class="text-green-600 font-bold">
                            ✅ Connected
                        </span>

                    </div>



                    <div class="flex justify-between bg-gray-100 p-4 rounded-xl">

                        <span>
                            API Service
                        </span>

                        <span class="text-green-600 font-bold">
                            ✅ Active
                        </span>

                    </div>


                </div>


            </div>



        </div>

    </div>


</x-app-layout>