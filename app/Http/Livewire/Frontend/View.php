<?php

namespace App\Http\Livewire\Admin\Category;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use Livewire\WithPagination;

use function PHPSTORM_META\map;

class Index extends Component
{
    public $quantityCount = 1;
    public function incrementQuantity()
    {
    }
    public function decrementQuantity()
    {
    }
    public function addToCard(int $productId)
    {
        if (Auth::check()) {
            dd('am in');
        } else {
            $this->dispatchBrowserEvent('message', [
                'text' => 'Please login',
                'type' => 'info',
                'status' => 401
            ]);
        }
    }
}