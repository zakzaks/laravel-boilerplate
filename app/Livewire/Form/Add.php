<?php

namespace App\Livewire\Form;

use Livewire\Component;

class Add extends Component
{
    public function render()
    {
        return view('livewire.form.add');
    }

    public function save()
    {
        // Your save logic here

        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Product saved successfully.'
        ]);

        // Redirect back to the table view using named route
        return $this->redirect(route('table'), navigate: true);
    }
}
