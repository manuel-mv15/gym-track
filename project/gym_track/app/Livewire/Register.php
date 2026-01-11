<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;

#[Layout('components.layouts.app')]
class Register extends Component
{
    public function render()
    {
        return view('livewire.register');
    }
}
