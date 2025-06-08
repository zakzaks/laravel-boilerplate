<?php

namespace App\Livewire\Form;

use Livewire\Component;

class Read extends Component
{
    public function delete()
    {
        session()->flash('toast', [
            'type' => 'success',
            'message' => 'Produc deleted successfully.'
        ]);

        // Redirect back to the table view using named route
        return $this->redirect(route('table'), navigate: true);
    }

    public function render()
    {
        return view('livewire.form.read');
    }
}
