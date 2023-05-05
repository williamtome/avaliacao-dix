<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Editar perfil') }}
                    </h2>
                </header>
                <div class="max-w-xl">
                    <form method="post" action="{{ route('role.update', $role) }}" class="space-y-6">
                        @csrf
                        @method('patch')

                        <div>
                            <x-input-label for="name" :value="__('Nome')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $role->name)" required autofocus autocomplete="name" />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <ul>
                                @foreach($resources as $resource)
                                    <li>
                                        <label>
                                            <input class="mx-2" type="checkbox" name="resources[]" value="{{ $resource->id }}" @if($role->resources->contains($resource->id)) checked @endif>
                                            {{ $resource->name }}
                                        </label>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('role.index') }}">Voltar</a>
                            <x-primary-button>{{ __('Salvar') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
