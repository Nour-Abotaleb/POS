<?php

namespace App\Livewire\Menu;

use App\Models\Menu;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;

class Menus extends Component
{
    use LivewireAlert;

    public $search = '';
    public $menuId = null;
    public $menuItems = false;
    public $showEditMenuModal = false;
    public $confirmDeleteMenuModal = false;

    /** @var int|null Only set when opening edit modal, to avoid storing full model. */
    public $editingMenuId = null;

    protected $listeners = ['refreshMenus' => '$refresh'];

    #[Computed]
    public function menus()
    {
        return Menu::withCount('items')->search('menu_name', $this->search)->get();
    }

    #[Computed]
    public function activeMenu()
    {
        return $this->menuId ? Menu::find($this->menuId) : null;
    }

    #[Computed]
    public function editingMenu()
    {
        return $this->editingMenuId ? Menu::find($this->editingMenuId) : null;
    }

    public function mount()
    {
        $firstMenu = Menu::first();
        if ($firstMenu) {
            $this->menuId = $firstMenu->id;
            $this->menuItems = true;
        }
    }

    /** Only set state; no DB call so card switch is instant. */
    public function showMenuItems($id)
    {
        $this->menuId = (int) $id;
        $this->menuItems = true;
    }

    public function showEditMenu($id)
    {
        $this->editingMenuId = (int) $id;
        $this->showEditMenuModal = true;
    }

    #[On('hideEditMenu')]
    public function hideEditMenu()
    {
        $this->showEditMenuModal = false;
        $this->editingMenuId = null;
    }

    public function deleteMenu($id)
    {
        Menu::destroy($id);
        $this->confirmDeleteMenuModal = false;
        if ($this->menuId == $id) {
            $this->menuItems = false;
            $this->menuId = null;
        }

        $this->alert('success', __('messages.menuDeleted'), [
            'toast' => true,
            'position' => 'top-end',
            'showCancelButton' => false,
            'cancelButtonText' => __('app.close')
        ]);
    }

    public function render()
    {
        return view('livewire.menu.menus');
    }

}
