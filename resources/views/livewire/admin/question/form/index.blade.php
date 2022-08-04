@section('title','ساخت پرسش نامه')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="body">
                        <div id="mail-nav">
                            <button type="button"
                                    class="btn btn-success waves-effect m-b-15">{{\App\Models\Date::latest()->take(1)->value('date')}}</button>
                            <ul class="" id="mail-folders">
                                <li>
                                    <a wire:click="enable(1)" href="javascript:;" title="ارسال">فیلد متن <span
                                                class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li>
                                    <a wire:click="enable(2)" title="پیش نویس">فیلد متن با پاسخ بلند <span
                                                class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li>
                                    <a href="#" wire:click="enable(6)" title="پیش نویس">چند گزینه ای <span
                                                class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li >
                                    <a wire:click="enable(7)" title="سطل آشغال"> کشویی<span
                                                class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_radio">
                                    <a href="javascript:;">چک باکس <span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="#" wire:click="enable(3)">ایمیل <span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="#" wire:click="enable(4)">عدد<span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="#" wire:click="enable(5)">پسورد <span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="#" wire:click="enable(8)">شماره تلفن<span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="#" wire:click="enable(9)">متن بدون سوال<span class="pull-right badge bg-blue"><i
                                                    class="fas fa-plus"></i></span></a>
                                </li>

                                <li class="form_bal_button">
                                    <a href="javascript:;">دکمه</a>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                @if(!is_null($defult))
                    <div class="card">
                        <div class="body">
                            <a href="#" wire:click="disable">
                                <span class="pull-right badge bg-red"> حذف فرم <i class="fas fa-trash"> </i></span>
                            </a>
                            <form wire:submit.prevent="createform">
                                <div class="row clearfix">
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <div class="form-line">
                                                {!! $defult->form!!}
                                                @error('route')
                                                <div class="alert alert-danger">
                                                    <span class="error">پر کردن این فیلد الزامی است</span>
                                                </div>
                                                @enderror
                                                @if($defult->id == 1 || $defult->id == 2)
                                                    <div class="mr-2">
                                                        <label> </label>
                                                        <input wire:model.lazy="placeholder"
                                                               type="text" compulsion class="form-control"
                                                               placeholder="الگوی پاسخ">
                                                    </div>
                                                    <div class="mt-5">

                                                        <div class="row">
                                                            <div class="mr-3">
                                                                <label>
                                                                    <input maxlength="200" minlength="0"
                                                                           wire:model.lazy="min"
                                                                           type="number" compulsion class="form-control"
                                                                           placeholder="حداقل کاراکتر">
                                                                </label>
                                                            </div>
                                                            <div class="mr-5">
                                                                <label>

                                                                    <input maxlength="200" minlength="0"
                                                                           wire:model.lazy="max"
                                                                           type="number" compulsion class="form-control"
                                                                           placeholder="حدااکثر کاراکتر">
                                                                </label>
                                                            </div>

                                                            @endif


                                                            <div class="m-4">
                                                                <label>
                                                                    <input value="required" wire:model.lazy="required"
                                                                           id="required" name="required" type="checkbox"
                                                                           checked="checked">
                                                                    <span>اجباری بودن فرم</span>
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                        <button id="submit" type="submit"
                                                class="btn-hover mr-5 btn-border-radius color-1 ">افزودن فرم
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                @if($defult->id == 6 || $defult->id == 7)
                                <div class="card">
                                    <div class="body">
                                        <div class="row">
                                            <div class="col-4">
                                                حداقل دو گزینه باید داشته باشد
                                                <form wire:submit.prevent="addoption">
                                                    <input required wire:model.lazy="option"
                                                           type="text" class="form-control"
                                                           placeholder="گزینه خود را درج کنید">
                                                    <button id="submit" type="submit"
                                                            class="btn-hover mr-5 btn-border-radius color-1 ">افزودن
                                                        گزینه
                                                    </button>
                                                </form>
                                            </div>
                                            <?php
                                            $option= \App\Models\Multichoise::latest()->take(1)->value('options')
                                            ?>
                                            @if($option !== null)
                                            @foreach($option as $i )
                                                    <a wire:click="add({{$i['option']}})">
                                                    {!! $i['option']!!}
                                                    </a>
                                            @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>

                    </div>
                @endif
            </div>
            @if($live != null)
                <?php
                $count = 0;
                ?>
                @foreach($live as $i)
                    <?php $count++ ?>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <div class="card">
                            <div class="body">
                                <a wire:click="deleteFormDay({{$i['key']}})" href="#">
                                    <span class="pull-right badge bg-red"> حذف فرم صفحه {{ $count}} <i
                                                class="fa fa-trash"></i> </span>
                                </a>
                                <a wire:click="UpdateForm({{$i['key']}})" href="#">
                                    <span class="pull-right badge bg-orange"> ویرایش فرم صفحه {{$count}} <i
                                                class="fa fa-trash"></i> </span>
                                </a>
                                <form action="form">
                                    <div class="row clearfix">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="form-line">
                                                    <p>
                                                    <span style="white-space:pre-line;">
                                                        @if(!is_array($i['content']))
                                                            {!! $i['content'] !!}
                                                        @else
                                                             @if(isset($i['title'])){{$i['title']}} @endif
                                                                     @if(isset($i['type']) == 'sliding' )
                                                                            @foreach($i['content'] as $b )
                                                                                <div class="row">
                                                                                     {!! $b['option'] !!}
                                                                                </div>
                                                                            @endforeach
                                                                    @else
                                                                            <div class="row">
                                                                                @foreach($i['content'] as $b )
                                                                                     {!! $b['option'] !!}
                                                                                @endforeach
                                                                                </div>
                                                                    @endif
                                                        @endif
                                                    </span>
                                                    </p>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div>

                        </div>

                    </div>
                @endforeach
            @endif
        </div>

    </div>
</section>
<script>
    const editor = CKEDITOR.replace('editor', {
        language: 'fa'
    });
    editor.on('change', function (event) {
    @this.set('route', event.editor.getData());
    })
</script>






