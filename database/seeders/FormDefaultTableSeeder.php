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
                    <input   wire:model.lazy="route"
                    type="text" class="form-control" placeholder="محل درج پاسخ">',
          'status'=>0
        ]);
        FormDefault::create([
          'form'=>'<label>سوال خود را درج کنید</label><br>
                    <div wire:ignore>
                    <textarea  wire:model.defer="route" id="editor" maxlength="1500"  cols="10" rows="10" ></textarea>
                    </div>',
          'status'=>0
        ]);

    }
}
