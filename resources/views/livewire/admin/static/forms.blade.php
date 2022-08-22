<div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
        <div class="card">
            <div class="body">

                @if(\App\Models\StaticForm::where('status',1)->first() !== null)
                    <div class="card">
                        <div class="body">
                            <div id="mail-nav">
                                <div class="row">
                                    @if(\App\Models\StaticForm::where('status',1)->Where('active',1)->first() !== null )
                                        <button wire:click="deactive" type="button"
                                                class="btn btn-warning waves-effect mr-2 m-b-15">غیر فعال کردن فرم</button>
                                    @else
                                        <button wire:click="active" type="button"
                                                class="btn btn-info waves-effect mr-2 m-b-15"> فعال کردن فرم</button>
                                    @endif
                                    <button type="button" wire:click="statusform"
                                            class="btn btn-info waves-effect ml-2 mr-2 m-b-15">{{\App\Models\StaticForm::where('status',1)->value('name')}}</button>
                                </div>

                                <ul class="" id="mail-folders">
                                    <li>
                                        <a wire:click="enableFeild(1)"    title="ارسال">فیلد متن <span
                                                    class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li>
                                        <a wire:click="enableFeild(2)" title="پیش نویس">فیلد متن با پاسخ بلند <span
                                                    class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li>
                                        <a href="#" wire:click="enableFeild(6)" title="پیش نویس">چند گزینه ای <span
                                                    class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li >
                                        <a wire:click="enableFeild(7)" title="سطل آشغال"> کشویی<span
                                                    class="pull-right badge bg-blue"><i class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li >
                                        <a >چک باکس <span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li >
                                        <a href="#" wire:click="enableFeild(3)">ایمیل <span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li class="form_bal_number">
                                        <a href="#" wire:click="enableFeild(4)">عدد<span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li class="form_bal_password">
                                        <a href="#" wire:click="enableFeild(5)">پسورد <span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li class="form_bal_password">
                                        <a href="#" wire:click="enableFeild(8)">شماره تلفن<span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>
                                    <li class="form_bal_password">
                                        <a href="#" wire:click="enableFeild(9)">متن بدون سوال<span class="pull-right badge bg-blue"><i
                                                        class="fas fa-plus"></i></span></a>
                                    </li>

                                    <li class="form_bal_button">
                                        <a href="#" wire:click="statusFormDisable" >بستن<span class="pull-right badge bg-blue"><i
                                                        class="far fa-times-circle"></i></span></a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
