<div>
    <form action="{{ route('login') }}" method="post" class="flex flex-col gap-4 p-4 border rounded shadow-md w-full max-w-sm mx-auto mt-10">
    @csrf   
    <h2 class="text-xl font-bold mb-4">Login</h2>
        
        <div class="flex flex-col">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" class="border p-2 rounded" value="admin">
            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="border p-2 rounded" value="admin">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>
        
        <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Login</button>
        
    </form>
</div>
