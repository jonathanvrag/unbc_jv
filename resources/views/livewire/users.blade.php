<div class="p-6 bg-gray-50 min-h-screen">
    @if (Auth::check())
        <div class="flex space-x-4 mb-6">
            <button wire:click='logout'
                class='bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105'>
                Cerrar Sesión
            </button>
            <button wire:click='create'
                class='bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105'>
                Crear Usuario
            </button>
        </div>

        <table class='min-w-full bg-white shadow-md rounded-lg overflow-hidden'>
            <thead class='bg-gray-800 text-white'>
                <tr>
                    <th class='px-6 py-3 text-left text-sm font-semibold uppercase'>Nombre</th>
                    <th class='px-6 py-3 text-left text-sm font-semibold uppercase'>Apellido</th>
                    <th class='px-6 py-3 text-left text-sm font-semibold uppercase'>Correo</th>
                    <th class='px-6 py-3 text-left text-sm font-semibold uppercase'>Teléfono</th>
                    <th class='px-6 py-3 text-left text-sm font-semibold uppercase'>Acciones</th>
                </tr>
            </thead>
            <tbody class='divide-y divide-gray-200'>
                @if ($users && $users->count())
                    @foreach ($users as $user)
                        <tr class='hover:bg-gray-50 transition duration-150 ease-in-out'>
                            <td class='px-6 py-4'>{{ $user->name }}</td>
                            <td class='px-6 py-4'>{{ $user->last_name }}</td>
                            <td class='px-6 py-4'>{{ $user->email }}</td>
                            <td class='px-6 py-4'>{{ $user->phone_number }}</td>
                            <td class='px-6 py-4'>
                                <button wire:click='edit({{ $user->id }})'
                                    class='bg-green-600 hover:bg-green-700 text-white px-3 py-1 rounded-md transition duration-300 ease-in-out transform hover:scale-105'>
                                    Editar
                                </button>
                                <button wire:click='delete({{ $user->id }})'
                                    class='bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded-md transition duration-300 ease-in-out transform hover:scale-105'>
                                    Eliminar
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5" class='px-6 py-4 text-center text-gray-500'>No hay usuarios disponibles.</td>
                    </tr>
                @endif
            </tbody>
        </table>
    @else
        <div class="flex items-center justify-center min-h-screen">
            <div class="bg-white p-8 rounded-lg shadow-lg text-center">
                <h2 class="text-2xl font-bold text-red-600 mb-4">Acceso Restringido</h2>
                <p class="text-gray-700 mb-4">Debe iniciar sesión para ver esta página.</p>
                <button wire:click='home'
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105">
                    Ir al Inicio de Sesión
                </button>
            </div>
        </div>
    @endif

    @if ($modal)
        <div class='fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4'>
            <div class='bg-white p-6 rounded-lg shadow-lg w-full max-w-md'>
                <h2 class='text-2xl font-bold mb-4'>{{ $isEditing ? 'Editar Usuario' : 'Crear Usuario' }}</h2>
                <form wire:submit.prevent="store" class="p-6">
                    <input type='text' wire:model='name' placeholder='Nombre'
                        class='w-full px-4 py-2 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500'>
                    @error('name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type='text' wire:model='last_name' placeholder='Apellido'
                        class='w-full px-4 py-2 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500'>
                    @error('last_name')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type='email' wire:model='email' placeholder='Correo'
                        class='w-full px-4 py-2 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500'>
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type='text' wire:model='phone_number' placeholder='Teléfono'
                        class='w-full px-4 py-2 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500'>
                    @error('phone_number')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type='password' wire:model='password' placeholder='Contraseña'
                        class='w-full px-4 py-2 mb-4 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500'>
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <div class="flex justify-end space-x-4">
                        <button type='submit'
                            class='bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105'>
                            Guardar
                        </button>
                        <button wire:click='closeModal' type='button'
                            class='bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition duration-300 ease-in-out transform hover:scale-105'>
                            Cancelar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</div>
