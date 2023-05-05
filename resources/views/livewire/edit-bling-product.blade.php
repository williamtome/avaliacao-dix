<div class="p-8">
    <div class="pb-4">
        <h1 class="font-semibold tracking-wide uppercase text-start">Editar Produto</h1>
    </div>
    <div class="py-2">
        <form wire:submit.prevent="update">
            <div>
                <!-- Descrição -->
                <div class="my-2">
                    <x-input-label for="description" :value="__('Descrição')" />

                    <x-text-input class="w-full" id="description" type="text" wire:model.defer="product.description" />
                    @error('product.description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 my-2">
                    <!-- Tipo -->
                    <div class="mr-1">
                        <x-input-label for="type" id="type" :value="__('Tipo')" />

                        <select class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" wire:model.defer="product.type">
                            <option value="">Selecione...</option>
                            <option value="P">Produto</option>
                            <option value="S">Serviço</option>
                        </select>
                        @error('product.type')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="ml-1">
                        <!-- Situação -->
                        <x-input-label for="situation" id="situation" :value="__('Situação')" />

                        <label class="relative inline-flex items-center justify-items-center cursor-pointer my-2">
                            <input type="checkbox" id="situation" wire:model="isActive" class="sr-only peer">
                            <div
                                class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">
                                {{ $isActive ? 'Ativo' : 'Inativo' }}
                            </span>
                        </label>
                        @error('product.situation')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 my-2">
                    <!-- Preço venda -->
                    <div class="mr-1">
                        <x-input-label for="price" :value="__('Preço')" />

                        <x-text-input class="w-full" id="price" type="text" wire:model.defer="product.price" />
                        @error('product.price')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Unidade -->
                    <div class="ml-1">
                        <x-input-label for="unit" :value="__('Unidade')" />

                        <x-text-input class="w-full" id="unit" type="text" wire:model.defer="product.unit" />
                        @error('product.unit')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 my-2">
                    <!-- Estoque Mínimo -->
                    <div class="mr-1">
                        <x-input-label for="minimum_stock" :value="__('Estoque Mínimo')" />

                        <x-text-input class="w-full" id="minimum_stock" type="number" wire:model.defer="product.minimum_stock" />
                        @error('product.minimum_stock')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Estoque Maximo -->
                    <div class="ml-1">
                        <x-input-label for="maximum_stock" :value="__('Estoque Máximo')" />

                        <x-text-input class="w-full" id="maximum_stock" type="number" wire:model.defer="product.maximum_stock" />
                        @error('product.maximum_stock')
                            <span class="text-sm text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Descrição Curta -->
                <div class="my-2">
                    <x-input-label for="short_description" :value="__('Descrição Curta')" />

                    <textarea
                        class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                        id="short_description"
                        type="text"
                        wire:model.defer="product.short_description">
                    </textarea>
                    @error('product.short_description')
                        <span class="text-sm text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button class="pr-4" type="button" onclick='Livewire.emit("closeModal")'>Cancelar</button>

                    <x-primary-button>Atualizar</x-primary-button>
                </div>
            </div>
        </form>
    </div>
</div>
