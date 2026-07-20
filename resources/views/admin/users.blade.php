<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold text-gray-800">
👤 User Management
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-7xl mx-auto px-6">


<div class="bg-white rounded-2xl shadow-xl p-8">


<h1 class="text-2xl font-bold mb-6">
Manage Users
</h1>



<div class="overflow-x-auto">

<table class="w-full">


<thead>

<tr class="bg-slate-800 text-white">


<th class="p-4 text-left">
Name
</th>


<th class="p-4">
Email
</th>


<th class="p-4">
Role
</th>


<th class="p-4">
Action
</th>


</tr>

</thead>



<tbody>


@foreach($users as $user)


<tr class="border-b hover:bg-gray-50">


<td class="p-4 font-semibold">
{{ $user->name }}
</td>


<td>
{{ $user->email }}
</td>


<td>

@if($user->role == 'admin')

<span class="bg-red-100 text-red-700 px-3 py-1 rounded-full">
👑 Admin
</span>

@else

<span class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full">
👤 User
</span>

@endif


</td>



<td class="p-4">


<a href="{{ route('users.edit',$user->id) }}"
class="bg-yellow-500 text-white px-4 py-2 rounded-lg">

✏️ Edit Role

</a>


<form action="{{ route('users.destroy',$user->id) }}"
method="POST"
class="inline">

@csrf
@method('DELETE')


<button
onclick="return confirm('Hapus user ini?')"
class="bg-red-500 text-white px-4 py-2 rounded-lg">

🗑 Delete

</button>


</form>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>


</div>


</div>


</div>


</x-app-layout>