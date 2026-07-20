<x-app-layout>

<x-slot name="header">
    <h2 class="font-bold text-3xl text-indigo-700">
        🌍 Global Economy Intelligence Dashboard
    </h2>
</x-slot>


<div class="py-8 bg-gray-50 min-h-screen">

<div class="max-w-7xl mx-auto px-6">


<!-- Search -->
<div class="bg-white rounded-3xl shadow-xl p-6 mb-8 border border-gray-100">

    <form method="GET">

        <label class="font-semibold text-gray-700">
            🔍 Search Country
        </label>

        <input
            type="text"
            name="search"
            value="{{ $search ?? '' }}"
            placeholder="Example: China, Indonesia, Japan..."
            class="mt-3 w-full md:w-96 rounded-xl border-gray-300 px-5 py-3 shadow-sm focus:ring-2 focus:ring-indigo-500 focus:outline-none">

    </form>

</div>



@if($country && $economy)


<!-- Cards -->
<div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">


<div class="bg-gradient-to-br from-indigo-600 to-blue-500 text-white rounded-3xl p-6 shadow-xl">

    <p class="text-sm uppercase tracking-wider opacity-80">
        🌍 Country
    </p>

    <h2 class="text-3xl font-extrabold mt-3">
        {{ $country->name }}
    </h2>

</div>



<div class="bg-gradient-to-br from-emerald-600 to-green-500 text-white rounded-3xl p-6 shadow-xl">

    <p class="text-sm uppercase tracking-wider opacity-80">
        🏷 ISO Code
    </p>

    <h2 class="text-3xl font-extrabold mt-3">
        {{ $economy['iso3'] }}
    </h2>

</div>



<div class="bg-gradient-to-br from-purple-600 to-indigo-500 text-white rounded-3xl p-6 shadow-xl">

    <p class="text-sm uppercase tracking-wider opacity-80">
        💰 Latest GDP
    </p>

    <h2 class="text-3xl font-extrabold mt-3">
        {{ $economy['latest_gdp'] }} B$
    </h2>

</div>



<div class="bg-gradient-to-br from-orange-500 to-red-500 text-white rounded-3xl p-6 shadow-xl">

    <p class="text-sm uppercase tracking-wider opacity-80">
        📅 Latest Year
    </p>

    <h2 class="text-3xl font-extrabold mt-3">
        {{ $economy['latest_year'] }}
    </h2>

</div>


</div>





<!-- CHART -->
<div class="bg-gradient-to-br from-slate-900 via-indigo-900 to-blue-900 rounded-3xl shadow-xl p-8">


<h2 class="text-3xl font-extrabold text-white mb-6">

📈 GDP History (Billion USD)

</h2>



<div style="height:350px">

<canvas id="gdpChart"></canvas>

</div>


</div>




<!-- Source -->
<div class="mt-8 bg-indigo-100 rounded-3xl p-6">

<h3 class="text-xl font-bold text-indigo-800">
🌐 Data Source
</h3>

<p class="text-gray-700 mt-2">
Economic data provided by World Bank API
</p>

</div>




@elseif($search)


<div class="bg-red-100 text-red-700 rounded-2xl p-6">

<h2 class="text-xl font-bold">
Country not found
</h2>

</div>


@endif



</div>

</div>





<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


@if($country && $economy)

<script>

const ctx = document.getElementById('gdpChart');


new Chart(ctx, {

type:'line',

data:{

labels:@json($chartYears),

datasets:[{

label:'GDP Billion USD',

data:@json($chartGDP),

borderWidth:4,

tension:.4,

fill:true,

pointRadius:5

}]

},


options:{

responsive:true,

maintainAspectRatio:false,


plugins:{

legend:{

labels:{

color:'white'

}

}

},


scales:{

x:{

ticks:{

color:'white'

}

},

y:{

ticks:{

color:'white'

}

}

}

}

});

</script>

@endif


</x-app-layout>