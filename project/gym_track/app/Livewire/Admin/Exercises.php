<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Exercise;
use Illuminate\Support\Facades\Auth;

class Exercises extends Component
{
    public $exercises, $name, $muscle_group, $exercise_id;

    public function render()
    {
        $this->exercises = Exercise::all();
        return view('livewire.admin.exercises');
    }

    public function cancel()
    {
        $this->resetCreateForm();
    }

    private function resetCreateForm()
    {
        $this->name = '';
        $this->muscle_group = '';
        $this->exercise_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'muscle_group' => 'required',
        ]);

        Exercise::updateOrCreate(['id' => $this->exercise_id], [
            'name' => $this->name,
            'muscle_group' => $this->muscle_group,
            // 'user_id' => Auth::id(), // Optional: if exercises are user-specific
        ]);

        session()->flash('message', $this->exercise_id ? 'Ejercicio actualizado correctamente.' : 'Ejercicio creado correctamente.');

        $this->resetCreateForm();
    }

    public function edit($id)
    {
        $exercise = Exercise::findOrFail($id);
        $this->exercise_id = $id;
        $this->name = $exercise->name;
        $this->muscle_group = $exercise->muscle_group;
    }

    public function delete($id)
    {
        Exercise::find($id)->delete();
        session()->flash('message', 'Ejercicio eliminado correctamente.');
    }
}
