<aside
    class="w-64 bg-white dark:bg-gray-800 shadow-md flex flex-col justify-between border-l border-gray-200 dark:border-gray-700">
    <div>
        {{-- Logo --}}
        <div class="h-16 flex items-center justify-center border-b border-gray-200 dark:border-gray-700">
            <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                GymTrack
            </span>
        </div>

        {{-- Navigation Links --}}
        <nav class="mt-6 flex flex-col space-y-1 px-2">
            <a href="{{ route('home') }}"
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Dashboard
            </a>


            @if (Auth::user()->getRoleNames()->first() == 'admin')
                <a href="{{ route('admin.exercises') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Ejercicios</a>
            @endif


            @if (Auth::user()->getRoleNames()->first() == 'user')
            
            <a href="{{ route('user.chest') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Pecho</a>
            <a href="{{ route('user.biceps') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Bíceps</a>
            <a href="{{ route('user.triceps') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Tríceps</a>
            <a href="{{ route('user.back') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Dorsal</a>
            <a href="{{ route('user.arms') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Brazos</a>
            <a href="{{ route('user.legs') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Piernas</a>
            <a href="{{ route('user.abs') }}" 
                class="flex items-center px-4 py-3 text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-700 rounded-lg transition-colors group">
                Abdomen</a>
            @endif
        </nav>
    </div>

    {{-- Logout --}}
    <div class="p-4 border-t border-gray-200 dark:border-gray-700">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                class="flex items-center w-full px-4 py-2 text-sm font-medium text-red-600 bg-red-50 hover:bg-red-100 rounded-lg transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Cerrar Sesión
            </button>
        </form>
    </div>
</aside>