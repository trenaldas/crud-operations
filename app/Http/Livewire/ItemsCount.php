<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ItemsCount extends Component
{
    public int $count;

    protected $listeners = [
        'countChanged' => 'updateCount'
    ];

    public function render()
    {
        return view('livewire.items-count');
    }

    public function updateCount(int $newValue): void
    {
        $this->count = $newValue;
    }
}
