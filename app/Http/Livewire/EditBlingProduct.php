<?php

namespace App\Http\Livewire;

use App\Enums\SituationProduct;
use App\Models\BlingProduct;
use LivewireUI\Modal\ModalComponent;

class EditBlingProduct extends ModalComponent
{
    public bool $isActive;
    public BlingProduct $product;

    public function mount(BlingProduct $product)
    {
        $this->product = $product;
        $this->isActive = $this->product->situation == SituationProduct::ATIVO;
    }

    public function update()
    {
        $this->validate();

        $this->product->situation = $this->isActive
            ? SituationProduct::ATIVO
            : SituationProduct::INATIVO;

        $this->product->save();

        $this->closeModalWithEvents([
            BlingProductsIndex::getName() => 'productUpdated'
        ]);
    }

    public function render()
    {
        return view('livewire.edit-bling-product');
    }

    public function rules(): array
    {
        return [
            'product.description' => 'required|string|max:191',
            'product.price' => 'required|string|max:191',
            'product.type' => 'required|in:P,S',
            'product.unit' => 'required|string',
            'product.situation' => 'required|in:Ativo,Inativo',
            'product.minimum_stock' => 'required|integer',
            'product.maximum_stock' => 'required|integer',
            'product.short_description' => 'nullable|string',
            'isActive' => 'required|boolean'
        ];
    }
}
