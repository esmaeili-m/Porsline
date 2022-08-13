@section('title','پرسش نامه')
<div style="
    width: 85%;
">
    <?php
    $current = 1;
    ?>
       
    <div class="col-md-12">
        <div class="col-12">
            <section class="content" style="
    margin: 0;
">
                <div class="container-fluid">
                    <form wire:submit.prevent="createform">
                        <div class="row clearfix">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="form-line">
                                        <div>
                                            @if (session()->has('message'))
                                                <div class="alert bg-pink alert-dismissible" role="alert">
                                                    <button type="button" class="close" data-dismiss="alert"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">×</span>
                                                    </button>
                                                    {{ session('message') }}

                                                </div>
                                        </div>
                                        @endif
                                    </div>
                                    @if(!is_array($form[$counter]['content']))
                                        {!! $form[$counter]['content'] !!}
                                    @else
                                        <div class="mb-5">
                                            {!! $form[$counter]['title'] !!}
                                        </div>

                                        @foreach($form[$counter]['content'] as $i)
                                            {!! $i['option'] !!}
                                        @endforeach
                                    @endif
                                    <div style="font-size:10px" class="m-2 row">
                                        برای رفتن به سوال بعد از دکمه بعدی استفاده کنید
                                    </div>
                                    <span class="error">
                                                     @error('value.number') {{$message}} @enderror
                                             </span>

                                    <div class="row">
                                        @if($counter < count($form))
                                            <button onclick="submit" type="submit"  class="btn-hover color-1">بعدی
                                            </button>
                                        @endif
                                        @if($counter == count($form))
                                            <button type="submit"  class="btn-hover color-3">پایان
                                            </button>
                                        @endif
                                        @if($counter >= 2)
                                            <button type="reset" wire:click="decrement" class="btn-hover color-2">قبلی
                                            </button>
                                        @endif
                                    </div>


                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </section>

        </div>
    </div>
</div>

