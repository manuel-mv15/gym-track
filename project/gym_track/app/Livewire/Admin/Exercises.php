<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Exercise;
use App\Models\MuscleGroup;
use Illuminate\Support\Facades\Auth;

class Exercises extends Component
{
    public $exercises, $name, $muscle_group_id, $exercise_id;
    public $muscle_groups;

    public function render()
    {
        $this->exercises = Exercise::with('muscleGroup')->get();
        $this->muscle_groups = MuscleGroup::all();
        return view('livewire.admin.exercises');
    }

    public function cancel()
    {
        $this->resetCreateForm();
    }

    private function resetCreateForm()
    {
        $this->name = '';
        $this->muscle_group_id = '';
        $this->exercise_id = null;
    }

    public function store()
    {
        $this->validate([
            'name' => 'required',
            'muscle_group_id' => 'required|exists:muscle_groups,id',
        ]);

        Exercise::updateOrCreate(['id' => $this->exercise_id], [
            'name' => $this->name,
            'muscle_group_id' => $this->muscle_group_id,
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
        $this->muscle_group_id = $exercise->muscle_group_id;
    }

    public function delete($id)
    {
        Exercise::find($id)->delete();
        session()->flash('message', 'Ejercicio eliminado correctamente.');
    }
}
