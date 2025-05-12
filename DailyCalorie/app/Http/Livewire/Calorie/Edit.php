<?php

namespace App\Http\Livewire\Calorie;

use App\Models\Calorie;
use Livewire\Component;

class Edit extends Component
{
    /**
    * define public variable
    */
    public $calorieId;
    public $name;
    public $calorie;

    /**
     * mount or construct function
     */
    public function mount($id)
    {
        $calorie = Calorie::find($id);
        
        if($calorie) {
            $this->calorieId   = $calorie->id;
            $this->name    = $calorie->name;
            $this->calorie  = $calorie->calorie;
        }
    }

    /**
     * update function
     */
    public function update()
    {
        $this->validate([
            'name'   => 'required',
            'calorie' => 'required',
        ]);

        if($this->calorieId) {

            $calorie = Calorie::find($this->calorieId);
            
            if($calorie) {
                $calorie->update([
                    'name'     => $this->name,
                    'calorie'   => $this->calorie
                ]);
            }
        }

        //flash message
        session()->flash('message', 'Data Berhasil Diupdate.');

        //redirect
        return redirect()->route('calorie.index');
    }

    public function render()
    {
        return view('livewire.calorie.edit');
    }
}