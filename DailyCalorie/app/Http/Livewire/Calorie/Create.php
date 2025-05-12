<?php

namespace App\Http\Livewire\Calorie;

use App\Models\Calorie;
use Livewire\Component;

class Create extends Component
{
    /**
     * define public variable
     */
    public $name;
    public $calorie;

    /**
     * store function
     */
    public function store()
    {
        $this->validate([
            'name'   => 'required',
            'calorie' => 'required',
        ]);

        $calorie = Calorie::create([
            'name'     => $this->name,
            'calorie'   => $this->calorie
        ]);

        //flash message
        session()->flash('message', 'Data Berhasil Disimpan.');

        //redirect
        return redirect()->route('calorie.index');
    }

    public function render()
    {
        return view('livewire.calorie.create');
    }
}