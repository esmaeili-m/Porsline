<?php

namespace App\Http\Livewire\Admin\Static\Analyze;

use App\Models\AnswerStatic;
use App\Models\StaticForm;
use Illuminate\Support\Facades\Request;
use Livewire\Component;
use Livewire\WithPagination;

class Answers extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public function render()
    {
        $answer=AnswerStatic::where('link',Request::segment(2))->get();
        $collection=StaticForm::where('link',Request::segment(2))->value('form');
        return view('livewire.admin.static.analyze.answers',compact('answer','collection'));
    }
}
