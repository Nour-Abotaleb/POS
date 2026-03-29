<?php

namespace App\Livewire\Forms;

use App\Models\Branch;
use Livewire\Component;

class ShopBranchesList extends Component
{
    public $restaurant;

    public $shopBranch;

    public function selectBranch($id)
    {
        $branch = Branch::withoutGlobalScopes()->find($id);

        session(['branch' => $branch]);

        $this->redirect(route('shop_restaurant', [$branch->restaurant->hash]).'?branch='.$id);
    }

    public function render()
    {
        return view('livewire.forms.shop-branches-list');
    }
}
