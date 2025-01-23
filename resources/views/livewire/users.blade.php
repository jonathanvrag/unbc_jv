<div>
    <button wire:click='create' class='bg-blue-500 text-white px-4 py-2 rounded'>Crear Usuario</button>

    <table class='table-auto w-full mt-4'>
        <thead>
            <tr>
                <th class='px-4 py-2'>Nombre</th>
                <th class='px-4 py-2'>Apellido</th>
                <th class='px-4 py-2'>Correo</th>
                <th class='px-4 py-2'>Teléfono</th>
                <th class='px-4 py-2'>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @if ($users && $users->count())
                @foreach ($users as $user)
                    <tr>
                        <td class='border px-4 py-2'>{{ $user->name }}</td>
                        <td class='border px-4 py-2'>{{ $user->last_name }}</td>
                        <td class='border px-4 py-2'>{{ $user->email }}</td>
                        <td class='border px-4 py-2'>{{ $user->phone_number }}</td>
                        <td class='border px-4 py-2'>
                            <button wire:click='edit({{ $user->id }})'
                                class='bg-green-500 text-white px-2 py-1 rounded'>Editar</button>
                            <button wire:click='delete({{ $user->id }})'
                                class='bg-red-500 text-white px-2 py-1 rounded'>Eliminar</button>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class='border px-4 py-2'>No hay usuarios disponibles.</td>
                </tr>
            @endif
        </tbody>
    </table>

    @if ($modal)
        <div class='fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center'>
            <div class='bg-white p-6 rounded'>
                <form>
                    <input type='text' wire:model='name' placeholder='Nombre' class='block w-full mb-2'>
                    @error('name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input type='text' wire:model='last_name' placeholder='Apellido' class='block w-full mb-2'>
                    @error('last_name')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input type='email' wire:model='email' placeholder='Correo' class='block w-full mb-2'>
                    @error('email')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input type='text' wire:model='phone_number' placeholder='Teléfono' class='block w-full mb-2'>
                    @error('phone_number')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <input type='password' wire:model='password' placeholder='Contraseña' class='block w-full mb-2'>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror

                    <button wire:click='@if ($user_id) update @else store @endif' type='button'
                        class='bg-blue-500 text-white px-4 py-2 rounded'>Guardar</button>
                    <button wire:click='closeModal' type='button'
                        class='bg-gray-500 text-white px-4 py-2 rounded'>Cancelar</button>
                </form>
            </div>
        </div>
    @endif
</div>
