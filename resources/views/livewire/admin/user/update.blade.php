@section('title','ویرایش ادمین')
<section class="content">
    <div class="container-fluid">
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <h2>ویرایش ادمین</h2>
                    </div>
                    <div class="body">
                        <form wire:submit.prevent="User"
                              role="form"
                              class="padding-10 categoryForm">
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="name">نام ادمین </label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input name="name" wire:model.laze="user.name" type="text" id="name"
                                                   class="form-control"
                                                   placeholder="نام ادمین را وارد کنید">
                                            @error('user.name')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="email">ایمیل </label>
                                </div>
                                <div class="col-lg-3 col-md-3 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.email" type="text" id="email"
                                                   class="form-control" placeholder="ایمیل ادمین را وارد کنید">
                                            @error('user.email')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="part">پسورد</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div  class="form-line">
                                            <input wire:model.laze="user.pass" type="text" id="part"
                                                   class="form-control" placeholder="رمز عبور را وارد کنید">
                                            @error('user.pass')
                                            <div class="alert alert-danger" style="text-align: center">
                                                {{$message}}
                                            </div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row clearfix">
                                <div class="col-lg-1 col-md-2 col-sm-4 col-xs-5 form-control-label">
                                    <label for="floor">نقش ادمین</label>
                                </div>
                                <div class="col-lg-3 col-md-10 col-sm-8 col-xs-7">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input wire:model.laze="user.role" type="text" id="Floor"
                                                   class="form-control" placeholder="نقش ادمین را وارد کنید">
                                            @error('user.role')
                                            <div class="alert alert-danger" style="text-align: center"> {{$message}}
                                            </div> @enderror
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
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>



