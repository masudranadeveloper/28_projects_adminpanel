@extends('admin.layout.master')
@section('admin_master')

<!--  -->
<div class="container">
    <div class="row">
        @if (session() -> has('msg'))
            <div class="alert alert-success col-12" role="alert">
                <h4 class="alert-heading">Alert</h4>
                <hr>
                <p>{{session() -> get('msg')}}</p>
            </div>
        @endif
    </div>
</div>

<form method="post" action="{{ route('admin_users_update_api', ['id' => $id]) }}">

    <div class="form-group mb-3">
        <label>Username</label>
        <input type="text" class="form-control" name="username" placeholder="Username..." value="{{ $data['username'] }}"  />
    </div>

    <div class="form-group mb-3">
        <label>Password</label>
        <input type="text" class="form-control" name="password" placeholder="Password..." value="{{ $data['password'] }}"  />
    </div>

    <div class="form-group mb-3">
        <label>Login time</label>
        <input type="number" class="form-control" name="login_time" placeholder="Login time..." value="{{ $data['login_time'] }}"  />
    </div>

    <div class="form-group mb-2">
        <label>Expired date</label>
        <input type="number" class="form-control" name="expired" placeholder="Expired date..." value="{{ ( $data['expired'] - time())/86400 }}"  />
    </div>

    <div class="form-group mb-3">
        <label>User 18+??</label>
        <select name="user_adult" class="form-select" style="text-transform: capitalize;">
            <option value="{{$data['user_adult']}}">{{$data['user_adult']}}</option>
            <option value="yes" class="@if($data['user_adult'] == "yes") d-none @endif">Yes</option>
            <option value="no" class="@if($data['user_adult'] == "no") d-none @endif">No</option>
        </select>
    </div>

    <div class="form-group mb-3">
        <label>Live TV access??</label>
        <select name="live_tv" class="form-select" style="text-transform: capitalize;">
            <option value="{{$data['live_tv']}}" >{{$data['live_tv']}}</option>
            <option value="yes" class="@if($data['live_tv'] == "yes") d-none @endif">Yes</option>
            <option value="no" class="@if($data['live_tv'] == "no") d-none @endif">No</option>
        </select>
    </div>

    <input type="submit" value="CONFIRM" class="btn btn-success">

    <a href="{{ route('admin_users_ban_api', ['id' => $id]) }}" class="btn btn-danger">BAN</a>
</form>

<div class="card mt-5  @if($data['role'] != "0") d-none @endif">
    <div class="card-header">
        <i class="fa fa-table"></i> Recent Login
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>IP</th>
                        <th>Location</th>
                        <th>City</th>
                        <th>Browser ID</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $reseller_users = \App\Models\loging_log::orderBy("id", 'DESC') -> where("username", $data['username']) -> paginate(10);
                    @endphp
                    @foreach ($reseller_users as $item)
                        <tr>
                            <td>{{ $item['ip'] }}</td>
                            <td>{{ $item['loc'] }}</td>
                            <td>{{ $item['city'] }}</td>
                            <td>{{ $item['browser_id'] }}</td>
                            <td>
                                @php
                                    $inputDate = $item['created_at'];
                                    $timestamp = strtotime($inputDate);
                                    $formattedDate = date('j M, Y h:i:s A', $timestamp);
                                    echo $formattedDate;
                                @endphp 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="data" style="margin-top:2rem; margin-bottom:2rem">
        {{$reseller_users -> onEachSide(1) -> links()}}
    </div>

</div>

<div class="card mt-5  @if($data['role'] == "0") d-none @endif">
    <div class="card-header">
        <i class="fa fa-table"></i> Total users({{\App\Models\users::where("creator_role", $id) -> where("role", "0") -> count()}})
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Expired date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $reseller_users = \App\Models\users::where("creator_role", $id) -> where("role", "0") -> paginate(10);
                    @endphp
                    @foreach ($reseller_users as $item)
                        <tr>
                            <td>{{ $item['id'] }}</td>
                            <td>{{ $item['username'] }}</td>
                            <td>{{ ( $item['expired'] - time())/86400 }}</td>
                            <td>
                                <a href="{{ route('admin_users_ban_api', ['id' => $item['id']]) }}" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                                <a href="{{ route('users.admin_update_web', ['id' => $item['id']]) }}" class="btn btn-primary"><i class="fa-solid fa-eye"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="data" style="margin-top:2rem; margin-bottom:2rem">
        {{$reseller_users -> onEachSide(1) -> links()}}
    </div>

</div>


@endsection
