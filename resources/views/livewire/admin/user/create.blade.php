@section('title','افزودن ادمین')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>افزودن ادمین</h2>
                    </div>
                    <div class="body">
                        <form wire:submit.prevent="User"
                              role="form"
                              class="padding-10 categoryForm">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">نام ادمین</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" wire:model.laze="user.name" type="text" id="Name"
                                                   class="form-control"
                                                   placeholder="نام ادمین را وارد کنید">
                                            @error('user.name')
                                            <div class="alert alert-danger" style="text-align: center"> {{$message}}

                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="system">ایمیل </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.email" type="text" id="system"
                                                   class="form-control" placeholder="ایمیل را وارد کنید">
                                            @error('user.email')
                                            <div class="alert alert-danger" style="text-align: center"> {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="part">نقش ادمین</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.role" type="text" id="part"
                                                   class="form-control" placeholder="نقش مورد نظر را وارد کنید">
                                            @error('system.part')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="floor">رمزعبور</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.pass" type="text" id="part"
                                                   class="form-control" placeholder="رمزعبور مورد نظر را وارد کنید">
                                            @error('user.pass')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="part">شماره تلفن</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.phone" type="text" id="part"
                                                   class="form-control" placeholder="شماره مورد نظر را وارد کنید">
                                            @error('system.part')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5">
                                </div>
                                <div class="col-lg-10 col-md-10 col-sm-8 col-xs-7">
                                    <button type="submit" class="btn btn-primary m-t-15 waves-effect">ساخت ادمین</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

