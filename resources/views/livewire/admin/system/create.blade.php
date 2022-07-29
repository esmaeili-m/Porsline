<section class="content">
    {{--    @include('livewire.errors.error')--}}
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>افزودن کابر</h2>
                    </div>
                    <div class="body">
                        <form wire:submit.prevent="User"
                              role="form"
                              class="padding-10 categoryForm">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">نام کاربر</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" wire:model.laze="system.name" type="text" id="Name"
                                                   class="form-control"
                                                   placeholder="نام کاربر را وارد کنید">
                                            @error('system.name')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="system"> کدملی </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.meli" type="text" id="system"
                                                   class="form-control" placeholder="کد ملی را وارد کنید">
                                            @error('system.system1')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="part">سیم کارت</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.sim" type="text" id="part"
                                                   class="form-control" placeholder="شماره سیم کارت را وارد کنید">
                                            @error('system.part')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="floor">مدل گوشی</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.mobile_model" type="text" id="Floor"
                                                   class="form-control" placeholder="مدل گوشی را وارد کنید">
                                            @error('system.floor')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="cpu">بارکد گوشی</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.mobile_id" type="text" id="cpu"
                                                   class="form-control" placeholder="بار کد گوشی">
                                            @error('system.cpu')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="ram">مدل لبتاب</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.laptop_model" type="text" id="ram"
                                                   class="form-control" placeholder="مدل لبتاب را وارد کنید">
                                            @error('system.ram')
                                            <div class="alert alert-danger" style="text-align: center"> پر کردن این فیلد
                                                الزامیست
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="case">بارکد لپتاپ</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="system.laptop_id" type="text" id="case" class="form-control"
                                                   placeholder="بارکدلپتاپ را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="key">بارکدکیس</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" wire:model.laze="system.laptop_case" id="code_key" class="form-control"
                                                   placeholder="بارکد کیس را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tv">مدل ماینیتور </label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" wire:model.laze="system.tv_model" id="code_key" class="form-control"
                                                   placeholder="مدل مانیتو را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tv">بارکد ماینیتور </label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" wire:model.laze="system.tv_id" id="code_key" class="form-control"
                                                   placeholder="بارکد مانیتو را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="tv">شماره تلفن </label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" wire:model.laze="system.phone" id="code_key" class="form-control"
                                                   placeholder="شماره تلفن را وارد کنید">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">ثبت کاربر</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

