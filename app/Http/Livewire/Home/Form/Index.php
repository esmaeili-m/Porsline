<?php

namespace App\Http\Livewire\Home\Form;

use App\Models\NewForm;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $form=NewForm::latest()->take(1)->value('form');
        $
        $form='oninput="this.className = "';
        return view('livewire.home.form.index',compact('form'))->layout('layouts.home');
    }
}
