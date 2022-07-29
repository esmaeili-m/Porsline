@section('title','لیست کاربران')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">
                    <div class="header">
                        <div class="row">
                            <a href="/CreateSystem">
                                <button href=""  class="btn-hover btn-border-radius color-5">
                                    افزودن کاربر
                                </button>
                            </a>
                            <a href="/trashed">
                                <button href=""  class="btn-hover btn-border-radius color-2">
                                    سطل زباله ({{\App\Models\System::onlyTrashed()->count()}})
                                </button>
                            </a>
                            <div class="col-4">
                                <a class="search-box">
                                    <form  action="" onclick="event.preventDefault();">
                                        <label style="margin-right: 20px">جستجو :</label>
                                        <input  wire:model.debounce.1000="search" type="text" class="search-box" placeholder="">
                                    </form>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div  class="body">
                        <div class="table-responsive">
                            <table  id="tableExport" class="display table table-hover table-checkable order-column m-t-20 width-per-100">
                                <thead >
                                <tr>
                                    <th>نام</th>
                                    <th>کدملی</th>
                                    <th>بارکد کیس</th>
                                    <th>بارکد مانیتور</th>
                                    <th>بارکد لبتاب</th>
                                    <th>بارکد گوشی</th>
                                    <th>تلفن</th>
                                    <th>تغییرات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($SystemUser as $system)
                                    <tr>
                                        <td>{{$system -> name}}</td>
                                        <td>{{$system -> meli}}</td>
                                        <td>{{$system -> laptop_case}}</td>
                                        <td>{{$system -> tv_id}}</td>
                                        <td>{{$system -> laptop_id}}</td>
                                        <td>{{$system -> mobile_id}}</td>
                                        <td>{{$system -> phone}}</td>

                                        <td>
                                           <a href="{{route('update',$system)}}"><button class="btn tblActnBtn">
                                                   <i class="material-icons">mode_edit</i>
                                            </button></a>
                                            <button wire:click="DeleteUser({{$system->id}})" class="btn tblActnBtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>