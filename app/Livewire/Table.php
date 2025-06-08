<?php

namespace App\Livewire;

use Livewire\Component;

class Table extends Component
{
    public $postIdToDelete = null;

    public function confirmDelete($id)
    {
        $this->postIdToDelete = $id;
    }

    public function delete()
    {
        $this->postIdToDelete = null;
        session()->flash('toast', ['type' => 'success', 'message' => 'Post deleted successfully!']);

        return $this->redirect(route('table'), navigate: true);
    }

    public function render()
    {
        return view('livewire.table');
    }
}
