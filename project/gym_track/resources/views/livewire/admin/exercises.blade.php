<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        @if (session()->has('message'))
            <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md mb-6" role="alert">
                <div class="flex">
                    <div>
                        <p class="text-sm">{{ session('message') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Form Section --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4 mb-8">
            <h2 class="text-xl font-bold mb-4 text-gray-800 dark:text-gray-200 border-b pb-2">
                {{ $exercise_id ? 'Editar Ejercicio' : 'Crear Nuevo Ejercicio' }}
            </h2>
            
            <form>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="name" placeholder="Ej: Press de Banca" wire:model="name">
                        @error('name') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                    <div class="mb-4">
                        <label for="muscle_group" class="block text-gray-700 dark:text-gray-200 text-sm font-bold mb-2">Grupo Muscular:</label>
                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline dark:bg-gray-700 dark:border-gray-600 dark:text-white" id="muscle_group" placeholder="Ej: Pecho" wire:model="muscle_group">
                        @error('muscle_group') <span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>
                </div>

                <div class="flex items-center justify-end mt-4 gap-3">
                    <button wire:click.prevent="cancel()" type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Cancelar
                    </button>
                    <button wire:click.prevent="store()" type="button" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        {{ $exercise_id ? 'Actualizar' : 'Guardar' }}
                    </button>
                </div>
            </form>
        </div>

        {{-- Table Section --}}
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg px-4 py-4">
            <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-200">Listado de Ejercicios</h3>
            @if($exercises->isEmpty())
                        
                <p class="text-gray-600 dark:text-gray-400">No hay ejercicios registrados.</p>
                            
            @else
            <div class="overflow-x-auto">
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr class="bg-gray-100 dark:bg-gray-700 border-b dark:border-gray-600">
                            <th class="px-4 py-3 w-20 text-gray-900 dark:text-white font-semibold">ID</th>
                            <th class="px-4 py-3 text-gray-900 dark:text-white font-semibold">Nombre</th>
                            <th class="px-4 py-3 text-gray-900 dark:text-white font-semibold">Grupo Muscular</th>
                            <th class="px-4 py-3 w-48 text-gray-900 dark:text-white font-semibold text-center">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($exercises as $exercise)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition duration-150 ease-in-out">
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $exercise->id }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $exercise->name }}</td>
                            <td class="px-4 py-3 text-gray-700 dark:text-gray-300">{{ $exercise->muscle_group }}</td>
                            <td class="px-4 py-3 text-center">
                                <button wire:click="edit({{ $exercise->id }})" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-1 px-3 rounded text-xs mr-1 transition duration-150 ease-in-out">Editar</button>
                                <button wire:click="delete({{ $exercise->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded text-xs transition duration-150 ease-in-out" onclick="return confirm('¿Estás seguro de querer eliminar este ejercicio?') || event.stopImmediatePropagation()">Borrar</button>
                            </td>
                        </tr>
                        @endforeach
                       
                    </tbody>
                </table>
               
            </div>
            @endif
        </div>
    </div>
</div>