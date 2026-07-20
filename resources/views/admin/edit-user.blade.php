<x-app-layout>

<x-slot name="header">

<h2 class="text-3xl font-bold">
✏️ Edit User Role
</h2>

</x-slot>


<div class="py-8">

<div class="max-w-3xl mx-auto px-6">

<div class="bg-white shadow rounded-xl p-6">


<form action="{{ route('users.update',$user->id) }}" method="POST">

@csrf
@method('PUT')


<div class="mb-4">

<label class="font-semibold">
Name
</label>

<input type="text"
value="{{ $user->name }}"
disabled
class="w-full border rounded-lg p-3 bg-gray-100">

</div>



<div class="mb-4">

<label class="font-semibold">
Email
</label>

<input type="text"
value="{{ $user->email }}"
disabled
class="w-full border rounded-lg p-3 bg-gray-100">

</div>



<div class="mb-4">

<label class="font-semibold">
Role
</label>


<select name="role"
class="w-full border rounded-lg p-3">


<option value="user"
{{ $user->role == 'user' ? 'selected' : '' }}>
User
</option>


<option value="admin"
{{ $user->role == 'admin' ? 'selected' : '' }}>
Admin
</option>


</select>

</div>



<button
class="bg-yellow-500 text-white px-5 py-2 rounded-lg">

Update Role

</button>


</form>


</div>

</div>

</div>


</x-app-layout>