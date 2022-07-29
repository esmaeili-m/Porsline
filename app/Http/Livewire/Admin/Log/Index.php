<?php

namespace App\Http\Livewire\Admin\Log;

use App\Models\Log;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;
    protected $queryString = ['search'];
    public function render()
    {
        $reports =  \App\Models\Log::where('action', 'LIKE', "%{$this->search}%")->
        orWhere('name', 'LIKE', "%{$this->search}%")->
        orWhere('url', 'LIKE', "%{$this->search}%")->
        latest()->paginate(15);
        return view('livewire.admin.log.index',compact('reports'));
    }
}
