@section('title','لیست  کاربران')
<section class="content">
    <div class="container-fluid">
        <!-- Exportable Table -->
        <div class="row clearfix">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card">



                       
                    <div  class="body">
                        <a href="/CreateUser">
                            <button href=""  class="btn-hover btn-border-radius color-5">
                                افزودن کاربر
                            </button>
                        </a>
                        <div class="table-responsive">
                            <table  id="tableExport" class="display table table-hover table-checkable order-column m-t-20 width-per-100">
                                <thead >
                                <tr>
                                    <th>نام</th>
                                    <th>ایمیل</th>
                                    <th>نقش</th>
                                    <th>تغییرات</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$user -> name}}</td>
                                        <td>{{$user -> email}}</td>
                                        <td>{{$user -> role}}</td>
                                        <td>
                                            <a href="{{route('user.edit',$user)}}"><button class="btn tblActnBtn">
                                                    <i class="material-icons">mode_edit</i>
                                                </button>
                                            </a>
                                            <a href="{{route('ShowUser.show',$user)}}"><button class="btn tblActnBtn">
                                                    <i class="material-icons">assignment</i>
                                                </button>
                                            </a>
                                            @if($user->name !== auth()->user()->name)
                                            <button wire:click="DeleteUser({{$user->id}})" class="btn tblActnBtn">
                                                <i class="material-icons">delete</i>
                                            </button>
                                            @endif
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
