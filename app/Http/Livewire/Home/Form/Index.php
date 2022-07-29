<?php

namespace App\Http\Livewire\Home\Form;

use App\Models\NewForm;
use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        $form=NewForm::latest()->take(1)->value('form');
        $form=json_decode($form);
        $form=$form->form1658952734;
        return view('livewire.home.form.index',compact('form'))->layout('layouts.home');
    }
}
