<?php

namespace Database\Seeders;

use App\Models\FormDefault;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormDefaultTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        FormDefault::truncate();
        $this->FormDefault();
    }
    private function FormDefault(){
        FormDefault::create([
          'form'=>  '<label>سوال خود را درج کنید</label><br>
                    <input  required maxlength="up" minlength="dw"  wire:model.lazy="route"   
                    type="text"  class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0 ,
          'type'=>'text',

        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <div wire:ignore>
                    <textarea required maxlength="up" minlength="dw" rows="4" class="form-control no-resize" wire:model.defer="route" id="editor"  placeholder="پاسخ خود را درج کنید" > </textarea>
                    </div>',
          'status'=>0,
           'type'=> 'textarea'
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input id="email"  required   wire:model.lazy="route"   
                    type="text"  class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0,
          'type'=> 'email',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input  required   wire:model.lazy="route"   
                    type="text"   class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0,
          'type'=> 'number',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input  required   wire:model.lazy="route"   
                    type="text"   class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0,
          'type'=> 'password',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input  required   wire:model.lazy="route"   
                    type="text"   class="form-control" placeholder="سوال خود را درج کنید">',
          'status'=>0,
          'type'=> 'multiple-choice',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input  required   wire:model.lazy="route"   
                    type="text"   class="form-control" placeholder="سوال خود را درج کنید">',
          'status'=>0,
          'type'=> 'sliding',
        ]);

    }
}
