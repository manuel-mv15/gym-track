<div>
    <form action="{{ route('register') }}" method="post" class="flex flex-col gap-4 p-4 border rounded shadow-md w-full max-w-sm mx-auto mt-10">
    @csrf
        <h2 class="text-xl font-bold mb-4">Register</h2>

        <div class="flex flex-col">
            <label for="username">Username</label>
            <input type="text" id="username" name   ="username" class="border p-2 rounded">
            @error('username') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="border p-2 rounded">
            @error('password') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
        </div>

        <div class="flex flex-col">
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation"
                class="border p-2 rounded">
        </div>

        <button type="submit" class="bg-green-500 text-white p-2 rounded hover:bg-green-600">Register</button>

        <div class="text-sm mt-2">
            Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login</a>
        </div>
    </form>
</div>