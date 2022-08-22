@section('title','ساخت پرسش نامه')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                @if($show == 1 && \App\Models\StaticForm::where('status',1)->first() == null)
                <div class="card body">
                    <ul class="list-group list-group-unbordered">
                        <button style="width:150px;" wire:click="enable" type="button"
                                class="mt-3 mr-3 mb-5 btn btn-outline-info waves-effect ">ساخت فرم جدید
                        </button>
                        @if(count($static)>0)
                            @foreach($static as $i)
                                <li>
                                    <a class="m-3" title="{{$i['name']}}">{{$i['name']}}
                                        <span wire:click="statusform({{$i['id']}})"
                                              class="mb-3 pull-right badge bg-blue"><i class="fas fa-plus"></i></span>
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                @else
                    <div class="body">
                        @if(\App\Models\StaticForm::where('status',1)->first() !== null)
                            <div class="card">
                                <div class="body">
                                    <div id="mail-nav">
                                        <div class="row">
                                            @if(\App\Models\StaticForm::where('status',1)->Where('active',1)->first() !== null )
                                                <button wire:click="deactive" type="button"
                                                        class="btn btn-outline-info waves-effect mr-2 m-b-15"> فعال
                                                    
                                                </button>
                                            @else
                                                <button wire:click="active" type="button"
                                                        class="btn btn-outline-danger waves-effect mr-2 m-b-15"> غیر فعال
                                                </button>
                                            @endif
                                            <button type="button" wire:click="statusform"
                                                    class="btn btn-outline-info waves-effect ml-2 mr-2 m-b-15">{{\App\Models\StaticForm::where('status',1)->value('name')}}</button>
                                        </div>

                                        <ul class="" id="mail-folders">
                                            <li>
                                                <a wire:click="enableFeild(1)" title="ارسال">فیلد متن <span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li>
                                                <a wire:click="enableFeild(2)" title="پیش نویس">فیلد متن با پاسخ
                                                    بلند <span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li>
                                                <a href="#" wire:click="enableFeild(6)" title="پیش نویس">چند گزینه
                                                    ای <span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li>
                                                <a wire:click="enableFeild(7)" title="سطل آشغال"> کشویی<span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li>
                                                <a>چک باکس <span class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li>
                                                <a href="#" wire:click="enableFeild(3)">ایمیل <span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li class="form_bal_number">
                                                <a href="#" wire:click="enableFeild(4)">عدد<span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li class="form_bal_password">
                                                <a href="#" wire:click="enableFeild(5)">پسورد <span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li class="form_bal_password">
                                                <a href="#" wire:click="enableFeild(8)">شماره تلفن<span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>
                                            <li class="form_bal_password">
                                                <a href="#" wire:click="enableFeild(9)">متن بدون سوال<span
                                                            class="pull-right badge bg-blue"><i
                                                                class="fas fa-plus"></i></span></a>
                                            </li>

                                            <li class="form_bal_button">
                                                <a href="#" wire:click="statusFormDisable">بستن<span
                                                            class="pull-right badge bg-red"><i
                                                                class="far fa-times-circle"></i></span></a>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    @endif
            </div>
            @if( $counter == 2)
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                    <div class="card">
                        <div class="body">
                            <a href="#" wire:click="disableDefultForm">
                                <span class="pull-right badge bg-red"> حذف فرم <i class="fas fa-trash"> </i></span>
                            </a>
                            <form wire:submit.prevent="createform">

                                <div class="form-line">
                                    <label class="active">نام فرم خود را درج کنید</label>
                                    <input autofocus name="route" required maxlength="up" minlength="dw"
                                           wire:model.lazy="route" type="text" class=""
                                           placeholder="پاسخ خود را درج کنید">
                                    @error('route') <span class="error">{{ $message }}</span> @enderror

                                </div>
                                <div class="mt-5 form-line">
                                    <label class="active">لینک فرم مورد نظر را به انگلیسی وارد کنید</label>
                                    <input autofocus name="route" required maxlength="up" minlength="dw"
                                           wire:model.lazy="link" type="text" class=""
                                           placeholder="برای مثال aradshenasi">
                                    @error('link') <span class="error">{{ $message }}</span> @enderror
                                </div>
                                <button id="submit" type="submit"
                                        class="btn-hover mr-5 btn-border-radius color-1 ">افزودن فرم
                                </button>
                            </form>
                        </div>

                    </div>
                </div>
            @endif

            @if($form !== null)
                @if($form->status == 1 && $counter==0)
                    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                        @if(!is_null($form))
                            <div class="card">
                                <div class="body">
                                    <a href="#" wire:click="disable">
                                        <span class="pull-right badge bg-red"> حذف فرم <i
                                                    class="fas fa-trash"> </i></span>
                                    </a>
                                    <form wire:submit.prevent="createFormFeild">
                                        <div class="row clearfix">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="form-line">
                                                        {!! $form->form!!}
                                                        @error('route')
                                                        <div class="alert alert-danger">
                                                            <span class="error">پر کردن این فیلد الزامی است</span>
                                                        </div>
                                                        @enderror
                                                        @if($form->id == 1 || $form->id == 2)
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
                                                                                   type="number" compulsion
                                                                                   class="form-control"
                                                                                   placeholder="حداقل کاراکتر">
                                                                        </label>
                                                                    </div>
                                                                    <div class="mr-5">
                                                                        <label>

                                                                            <input maxlength="200" minlength="0"
                                                                                   wire:model.lazy="max"
                                                                                   type="number" compulsion
                                                                                   class="form-control"
                                                                                   placeholder="حدااکثر کاراکتر">
                                                                        </label>
                                                                    </div>

                                                                    @endif


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
                                        @if($form->id == 6 || $form->id == 7)
                                            <div class="card">
                                                <div class="body">
                                                    <div class="row">
                                                        <div class="col-6">
                                                            حداقل دو گزینه باید داشته باشد
                                                            <form wire:submit.prevent="addoption">
                                                                <input required wire:model.lazy="option"
                                                                       type="text" class="form-control"
                                                                       placeholder="گزینه خود را درج کنید">
                                                                <button id="submit" type="submit"
                                                                        class="btn-hover mr-5 btn-border-radius color-1 ">
                                                                    افزودن
                                                                    گزینه
                                                                </button>
                                                            </form>
                                                        </div>
                                                        <div class="col-8">
                                                            <div class="row">
                                                                <?php
                                                                $option = \App\Models\Multichoise::latest()->take(1)->where('status', 1)->value('options')
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
                                            </div>
                                    </div>
                                    @endif
                                </div>

                            </div>
                        @endif
                    </div>
                @endif
            @endif

        </div>
        @if($live !== null  && $live!=='null')

            <?php
            $count = 0;
            ?>
            @foreach($live as $i)
                <?php $count++ ?>
                <div class="col-xs-12 col-sm-12 col-md-1 col-lg-12">
                    <div class="card">
                        <div class="body">
                            <a wire:click="deleteFormDay({{$i['key']}})" href="#">
                                    <span class="pull-right badge bg-red"> حذف فرم صفحه {{ $count}} <i
                                                class="fa fa-trash"></i> </span>
                            </a>
                            <div class="col-3">
                                <?php
                                $param = $i['key']
                                ?>
                                <form wire:submit.prevent="order({{$param}})">
                                    <div class="row">
                                        <input required wire:model.defer="order"
                                               type="number" compulsion class="form-control"
                                               placeholder="جایگاه فرم ">
                                        <button class="btn  color-1 " type="submit">ثبت</button>
                                    </div>

                                </form>
                            </div>
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
                                                    @if(isset($i['title']))
                                                        {!! $i['title'] !!} @endif
                                                    @if(isset($i['type']) == 'sliding' )
                                                        <div class="row">

                                                            @foreach($i['content'] as $b )
                                                                {!! $b['option'] !!}

                                                            @endforeach
                                                        </div>
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
</section>
<script>
    const editor = CKEDITOR.replace('editor', {
        language: 'fa'
    });
    editor.on('change', function (event) {
    @this.set('route', event.editor.getData());
    })
</script>






