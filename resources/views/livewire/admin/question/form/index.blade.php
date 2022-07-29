<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                <div class="card">
                    <div class="body">
                        <div id="mail-nav">
                            <button type="button" class="btn btn-success waves-effect m-b-15">{{\App\Models\Date::latest()->first()->value('date')}}</button>
                            <ul class="" id="mail-folders">
                                <li>
                                    <a wire:click="enable(1)" href="javascript:;" title="ارسال">فیلد متن <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_textarea">
                                    <a href="javascript:;" title="پیش نویس">فیلد متن با پاسخ بلند <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_select">
                                    <a href="javascript:;" title="سطل آشغال"> انتخابی<span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li >
                                <li class="form_bal_radio" >
                                    <a href="javascript:;"  >چک باکس <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_email">
                                    <a href="javascript:;" >ایمیل <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_number">
                                    <a href="javascript:;" > <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span>شماره</a>
                                </li>
                                <li class="form_bal_password">
                                    <a href="javascript:;" >پسورد <span class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                </li>
                                <li class="form_bal_button">
                                    <a href="javascript:;" >دکمه</a>
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
                        <form wire:submit.prevent="createform" >
                            <div class="row clearfix">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            {!! $defult->form!!}
                                            @error('route')
                                                <div class="alert alert-danger">
                                                    <span class="error">پر کردن این فیلد الزامی است</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>


                            <button  type="submit" class="btn-hover mr-5 btn-border-radius color-1 ">افزودن فرم</button>
                            <a wire:click="disable">
                                <button  class="btn-hover mr-5 btn-border-radius color-2 ">حذف فرم</button>
                            </a>
                        </form>
                    </div>

                </div>
                @endif
            </div>
            @if($live != false)
                <?php
                $count=1;
                ?>
            @foreach($live as $i)
            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="body">
                            <a wire:click="deleteFormDay({{$count}})" href="#">
                                <span   class="pull-right badge bg-red"> فرم صفحه {{ $count++ }} <i class="fa fa-trash"></i> </span>
                            </a>
                            <form wire:submit.prevent="createform" >
                                <div class="row clearfix">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="form-line">
                                                {!! $i !!}
                                            </div>
                                        </div>

                                    </div>
                                </div>
{{--                                <button  type="submit" class="btn-hover mr-5 btn-border-radius color-1 ">افزودن فرم</button>--}}
{{--                                <a wire:click="disable">--}}
{{--                                    <button  class="btn-hover mr-5 btn-border-radius color-2 ">حذف فرم</button>--}}
{{--                                </a>--}}
                            </form>
                        </div>

                    </div>

            </div>
            @endforeach
                @endif
        </div>
    </div>
</section>
{{--<div class="row clearfix m-5">--}}
{{--    <div class="col-sm-9">--}}
{{--        <div class="form-group">--}}
{{--            <div class="form-line">--}}
{{--                <label for="html">متن سوال</label><br>--}}
{{--                <input wire:model.lazy="route"  type="text" class="form-control" placeholder="سوال خود را درج کنید">--}}
{{--            </div>--}}
{{--            <div class="alert alert-danger">--}}
{{--                @error('route') <span class="error">پر کردن این فیلد الزامی است</span> @enderror--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


<script src="{{asset('form/js/jquery.min.js')}}"></script>
<script src="{{asset('form/js/jquery-ui.min.js')}}"></script>
<script src="{{asset('form/js/tether.min.js')}}"></script>
<script src="{{asset('form/js/bootstrap.min.js')}}"></script>
<script src="{{asset('form/js/form_builder.js')}}"></script>

