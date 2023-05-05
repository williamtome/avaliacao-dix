<div>
    <div class="mx-auto max-w-8xl sm:px-6 lg:px-8">

        <div class="flex justify-between mb-5 border-b">
            <div class="search">
                <span class="px-2">Busca</span>
                <input type="text" wire:model="search" class="px-4 py-2 border rounded" placeholder="Encontre na tabela...">
            </div>
            <div class="orderBy">
                <span class="px-2">Ordenar</span>
                <select wire:model="orderBy" class="px-4 py-2 border rounded">
                    <option value="ASC">Do 1º ao último</option>
                    <option value="DESC">Do último ao 1º</option>
                </select>
            </div>
        </div>

        <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">

                <table class="w-full whitespace-nowrap">
                    <thead
                        class="font-semibold tracking-wide text-center text-gray-900 uppercase bg-gray-100 border-b border-gray-600 text-md">
                        <tr>
                            <th>ID Produto</th>
                            <th>Código SKU</th>
                            <th>Descrição</th>
                            <th>Situação</th>
                            <th>Qtd.</th>
                            @if (auth()->user()->role->resources->where('resource', 'product.update'))
                                <th></th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                        <tr tabindex="0" class="h-1 border border-gray-100 rounded focus:outline-none">
                            <td class="px-4 py-3 font-semibold border text-md">
                                <div class="flex items-center pl-5">
                                    <p class="font-semibold text-black">
                                        {{ $product->new_bling_id }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-4 py-3 font-semibold border text-md">
                                <div class="flex items-center pl-5">
                                    <p class="font-semibold text-black">
                                        {{ $product->code }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-4 py-3 font-semibold border text-md">
                                <div class="flex items-center pl-5">
                                    <p class="font-semibold text-black">
                                        {{ $product->description }}
                                    </p>
                                </div>
                            </td>
                            <td class="px-4 py-3 font-semibold border text-md">
                                <span
                                    class="px-2 py-1 font-semibold leading-tight rounded-sm {{ $product->situation == 'Inativo' ? 'text-red-700 bg-red-100' : 'text-green-700 bg-green-100' }}">
                                    {{ $product->situation }}
                                </span>
                            </td>
                            <td class="px-4 py-3 font-semibold border text-md">
                                <div class="flex items-center pl-5">
                                    <p class="font-semibold text-black">
                                        {{ $product->quantity }}
                                    </p>
                                </div>
                            </td>
                            @if (auth()->user()->role->resources->where('resource', 'product.update'))
                                <td>
                                    <button class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase transition duration-150 ease-in-out bg-gray-800 border border-transparent rounded-md hover:bg-gray-700 focus:bg-gray-700 active:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2" onclick='Livewire.emit("openModal", "edit-bling-product", @json([$product]))'>
                                        {{ __('Editar') }}
                                    </button>
                                </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                @if ($products)
                    {{ $products->links() }}
                @endif
            </div>
        </div>
    </div>
</div>
