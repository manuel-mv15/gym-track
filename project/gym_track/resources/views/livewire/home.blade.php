@if (Auth::check())

<div>
   

@if (Auth::user()->getRoleNames()->first() == 'admin')

<div>
    <h1>Admin</h1>
</div>

@elseif (Auth::user()->getRoleNames()->first() == 'user')

<div>
    <h1>User</h1>
</div>

@endif


</div>
@else

<div class="min-h-screen bg-gray-100 flex items-center justify-center">
    <div class="max-w-md w-full bg-white rounded-lg shadow-lg p-8">
        <h1 class="text-3xl font-bold text-center mb-6 text-gray-800">Gym Track</h1>
        <p class="text-gray-600 text-center mb-8">Bienvenido a tu seguimiento de entrenamiento.</p>

        <div class="space-y-4">
            <a href="{{ route('loginFromView') }}"
                class="block w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-4 rounded-lg text-center transition duration-200">
                Iniciar Sesión
            </a>

            <a href="{{ route('registerFromView') }}"
                class="block w-full bg-white border-2 border-green-500 text-green-500 hover:bg-green-50 font-semibold py-3 px-4 rounded-lg text-center transition duration-200">
                Crear Cuenta
            </a>
        </div>
    </div>
</div>

@endif
