@section('title','پرسشنامه')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>
                            <strong>انتخاب تاریخ </strong>پرسشنامه </h2>
                    </div>
                    <div class="body">
                        <a class="demo-masked-input">
                            <div class="row clearfix">

                                <div class="col-md-4">
                                    <form wire:submit.prevent="date">
                                    <b>تاریخ</b>
                                    <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>

                                        <div class="form-line">
                                            <input wire:model.lazy="date.date" value="" type="text" class="form-control date"
                                                   placeholder=" {{$data}}">
                                        </div>
                                        @error('date.date') <span class="bg-red">{{ $message }}</span> @enderror
                                    </div>
                                    <button type="submit" class="btn-hover btn-border-radius color-1 ">ثبت</button>
                                    </form>
                                </div>
                            </div>
                            <a href="{{route('NotificationsStartDay')}}">
                                <button type="submit" class="btn-hover btn-border-radius color-2 ">+ صفحه شروع</button>
                            </a>
                            <a href="{{route('FormCreate')}}">
                                <button  type="submit" class="btn-hover btn-border-radius color-3 ">+ افزودن فرم</button>
                            </a>
                            <button type="submit" class="btn-hover btn-border-radius color-7 ">+ افرودن لینک ها</button>
                             <a href="{{route('NotificationsEndDay')}}">
                            <button type="submit" class="btn-hover btn-border-radius color-8 ">+ صفحه پایان</button>
                        </a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

</section>

  
  


