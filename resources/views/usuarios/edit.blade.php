<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editar Usuario: {{ $usuario->username }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900 dark:text-gray-100">

                    {{-- Errores de validación --}}
                    @if ($errors->any())
                        <div class="mb-6 p-4 bg-red-100 text-red-800 rounded-md">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST"
                          action="{{ route('usuarios.update', $usuario->id_usuario) }}">

                        @csrf
                        @method('PUT')

                        {{-- Usuario y contraseña --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="username" class="block text-sm font-medium mb-1">
                                    Usuario
                                </label>

                                <input
                                    type="text"
                                    id="username"
                                    name="username"
                                    value="{{ old('username', $usuario->username) }}"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('username') border-red-500 @enderror"
                                >
                            </div>

                            <div>
                                <label for="password" class="block text-sm font-medium mb-1">
                                    Contraseña
                                </label>

                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                                >
                            </div>

                        </div>

                        {{-- Rol y estado --}}
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">

                            <div>
                                <label for="rol" class="block text-sm font-medium mb-1">
                                    Rol
                                </label>

                                <select
                                    id="rol"
                                    name="rol"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('rol') border-red-500 @enderror"
                                >
                                    <option value="admin"
                                        {{ old('rol', $usuario->rol) == 'admin' ? 'selected' : '' }}>
                                        admin
                                    </option>

                                    <option value="vendedor"
                                        {{ old('rol', $usuario->rol) == 'vendedor' ? 'selected' : '' }}>
                                        vendedor
                                    </option>

                                    <option value="supervisor"
                                        {{ old('rol', $usuario->rol) == 'supervisor' ? 'selected' : '' }}>
                                        supervisor
                                    </option>
                                </select>
                            </div>

                            <div>
                                <label for="activo" class="block text-sm font-medium mb-1">
                                    Estado
                                </label>

                                <select
                                    id="activo"
                                    name="activo"
                                    required
                                    class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('activo') border-red-500 @enderror"
                                >
                                    <option value="1"
                                        {{ old('activo', $usuario->activo) == 1 ? 'selected' : '' }}>
                                    </option>

                                    <option value="0"
                                        {{ old('activo', $usuario->activo) == 0 ? 'selected' : '' }}>
                                        Inactivo
                                    </option>
                                </select>
                            </div>

                        </div>

                        {{-- Empresa --}}
                        <div class="mb-6">
                            <label for="id_empresa" class="block text-sm font-medium mb-1">
                                Empresa
                            </label>

                            <select
                                id="id_empresa"
                                name="id_empresa"
                                required
                                class="w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('id_empresa') border-red-500 @enderror"
                            >
                                <option value="">Seleccione una Empresa</option>

                                @foreach ($empresas as $empresa)
                                    <option
                                        value="{{ $empresa->id_empresa }}"
                                        {{ old('id_empresa', $usuario->id_empresa) == $empresa->id_empresa ? 'selected' : '' }}>
                                        {{ $empresa->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Botones --}}
                        <div class="flex justify-end gap-3">

                            <a href="{{ route('usuarios.index') }}"
                               class="inline-flex items-center px-4 py-2 bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium rounded-md">
                                Cancelar y Volver
                            </a>

                            <button
                                type="submit"
                                class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md">
                                Actualizar Usuario
                            </button>

                        </div>

                    </form>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>