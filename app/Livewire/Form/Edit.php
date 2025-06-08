<?php

namespace App\Livewire\Form;

use Livewire\Component;

class Edit extends Component
{
    public function delete()
    {
        session()->flash('toast', ['type' => 'success', 'message' => 'Product deleted successfully!']);

        return $this->redirect(route('table'), navigate: true);
    }

    public function update()
    {
        session()->flash('toast', ['type' => 'success', 'message' => 'Product updated successfully!']);
        return $this->redirect(route('table'), navigate: true);
    }

    public function render()
    {
        return view('livewire.form.edit');
    }
}
