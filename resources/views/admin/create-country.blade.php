<x-app-layout>

<x-slot name="header">
    <h2 class="text-3xl font-bold">
        🌍 Add Country
    </h2>
</x-slot>


<div class="py-8">

<div class="max-w-3xl mx-auto px-6">

<div class="bg-white shadow rounded-xl p-6">


<form action="{{ route('countries.store') }}" method="POST">

@csrf


<label class="block mb-2 font-semibold">
Country Name
</label>

<input type="text"
name="name"
class="w-full border rounded-lg p-3 mb-4">



<label class="block mb-2 font-semibold">
Capital
</label>

<input type="text"
name="capital"
class="w-full border rounded-lg p-3 mb-4">



<label class="block mb-2 font-semibold">
Region
</label>

<input type="text"
name="region"
class="w-full border rounded-lg p-3 mb-4">



<button
class="bg-green-600 text-white px-5 py-2 rounded-lg">

Save Country

</button>


</form>


</div>

</div>

</div>


</x-app-layout>