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
          'form'=>  '<label>سوال خود را درج کنید</label>
                    <input autofocus name="route" required maxlength="up" minlength="dw"  wire:model.lazy="route"   
                    type="text"  class  placeholder="پاسخ خود را درج کنید" >',
          'status'=>0 ,
          'type'=>'text',

        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <div wire:ignore>
                    <textarea autofocus style="background-color: #f1f2f7" name="route" required maxlength="up" minlength="dw" rows="10" class="form-control no-resize" wire:model.defer="route" id="editor"  placeholder="پاسخ خود را درج کنید" > </textarea>
                    </div>',
          'status'=>0,
           'type'=> 'textarea'
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input name="route" id="email"  required   wire:model.lazy="route"   
                    type="text"  class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0,
          'type'=> 'email',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input  name="route"  required   wire:model.lazy="route"   
                    type="text"   class="form-control" placeholder="پاسخ خود را درج کنید">',
          'status'=>0,
          'type'=> 'number',
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <input name="route"  required   wire:model.lazy="route"   
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
          'type'=> 'multiple-choice',

        ]);
        FormDefault::create([
            'form'=>  '<label>سوال خود را درج کنید</label><br>
                    <input id="number"  maxlength="up" minlength="dw"  required name="route"    wire:model.lazy="route"   
                    type="text"  class="form-control" placeholder="پاسخ خود را درج کنید">',
            'status'=>0 ,
            'type'=>'number',

        ]);
        FormDefault::create([
            'form'=>'<label>متن خود را درج کنید</label><br>
                    <div wire:ignore>
                    <textarea rows="4" class="form-control no-resize" wire:model.defer="route" id="editor"  placeholder="پاسخ خود را درج کنید" > </textarea>
                    </div>',
            'status'=>0,
            'type'=> 'textarea'
        ]);

    }
}
