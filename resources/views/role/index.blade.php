<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Perfis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div>
                <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">
                    <div class="w-full border-b">
                        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <table class="w-full whitespace-nowrap">
                                    <thead class="font-semibold tracking-wide text-center text-gray-900 uppercase bg-gray-100 border-b border-gray-600 text-md">
                                        <tr>
                                            <th>Nome</th>
                                            <th>Data de criação</th>
                                            @if (auth()->user()->role->resources->where('resource', 'role.update'))
                                                <th></th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($roles as $role)
                                            <tr tabindex="0" class="h-1 border border-gray-100 rounded focus:outline-none">
                                                <td class="px-4 py-3 font-semibold border text-md">
                                                    <div class="flex items-center pl-5">
                                                        <p class="font-semibold text-black">
                                                            {{ $role->name }}
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 font-semibold border text-md">
                                                    <div class="flex items-center pl-5">
                                                        <p class="font-semibold text-black">
                                                            {{ $role->createdAt() }}
                                                        </p>
                                                    </div>
                                                </td>
                                                @if (auth()->user()->role->resources->where('resource', 'role.update'))
                                                    <td class="flex justify-center">
                                                        <a href="{{ route('role.edit', $role) }}" class="inline-flex items-center m-2 px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                                                            Editar
                                                        </a>
                                                    </td>
                                                @endif
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
