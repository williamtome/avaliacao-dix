<?php

namespace App\Http\Livewire;

use App\Models\BlingProduct;
use Livewire\Component;
use Livewire\WithPagination;

class BlingProductsIndex extends Component
{
    use WithPagination;

    public $search;
    public $orderBy = 'ASC';
    public $listeners = ['productUpdated' => 'render'];

    public function render()
    {
        $products = BlingProduct::orderBy('created_at', $this->orderBy);

        $products = $products->when($this->search, function ($queryBuilder) {
            return $queryBuilder->where('description', 'LIKE', '%' . $this->search . '%')
                ->orWhere('code', 'LIKE', '%' . $this->search . '%');
        });

        $products = $products->count() ? $products->paginate(100) : [];

        return view('livewire.bling-products-index', compact('products'));
    }
}
