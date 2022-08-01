<?php

namespace App\Http\Livewire\Home\Form;

use App\Models\Date;
use App\Models\FormDay;
use Livewire\Component;
use Livewire\WithPagination;

class Quesitons extends Component
{
    use WithPagination;
    public $counter;
    public $size;
    public $route;
    
    protected $paginationTheme = 'bootstrap';
    public function increment()
    {


        
        // $this->counter = $this->counter + $this->size;
        $this->counter += $this->size;
    }

    public function decrement()
    {
        
        if($this->counter !== 1){
            $this->counter -= $this->size;
        }
    }
    public function mount()
    {
        $this->counter = 1;
        $this->size = 1; //default value
    }
    public function render()
    {
        $day=Date::latest()->take(1)->value('id');
        $form=FormDay::where('id_day',$day)->value('form');
        return view('livewire.home.form.quesitons',compact('form'))->layout('layouts.home');
    }
}
