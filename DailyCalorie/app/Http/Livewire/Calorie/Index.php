<?php

namespace App\Http\Livewire\Calorie;

use App\Models\Calorie;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    /**
     * destroy function
     */
    public function destroy($calorieId)
    {
        $calorie = Calorie::find($calorieId);

        if($calorie) {
            $calorie->delete();
        }

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('calorie.index');

    }

    public function render()
    {
        return view('livewire.calorie.index', [
            'calories' => Calorie::latest()->paginate(5)
        ]);
    }
}