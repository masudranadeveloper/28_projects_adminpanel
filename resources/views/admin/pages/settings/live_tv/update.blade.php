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

<form method="post" action="{{ route('admin_settings_livetv_update_api', ['id' => $data['id']]) }}" enctype="multipart/form-data">

    <div class="form-group mb-3">
        <label>Movie name</label>
        <input type="text" class="form-control" name="name" value="{{$data['name']}}"/>
    </div>

    <div class="form-group mb-3">
        <label for="content18">18+ content</label>
        <input type="checkbox" name="content18" id="content18" value="yes" @if($data['content18'] == "yes") checked @endif />
    </div>

    <br>
    <hr>
    <br>

    <div class="card p-3 mb-4">
        <div class="form-group">
            <label>Movie Links1</label>
            <input type="text" class="form-control" name="links1" value="{{$data['links1']}}" />
        </div>
        <div class="form-group mb-3">
            <label>Movie Links Expired1</label>
            <input type="text" class="form-control" name="expired1" value="{{$data['expired1']}}" />
        </div>
    
        <div class="form-group">
            <label>Movie Links2</label>
            <input type="text" class="form-control" name="links2" value="{{$data['links2']}}" />
        </div>
        <div class="form-group mb-3">
            <label>Movie Links Expired2</label>
            <input type="text" class="form-control" name="expired2" value="{{$data['expired2']}}" />
        </div>
    
        <div class="form-group">
            <label>Movie Links3</label>
            <input type="text" class="form-control" name="links3" value="{{$data['links3']}}" />
        </div>
        <div class="form-group mb-3">
            <label>Movie Links Expired3</label>
            <input type="text" class="form-control" name="expired3" value="{{$data['expired3']}}" />
        </div>
    
        <div class="form-group">
            <label>Movie Links4</label>
            <input type="text" class="form-control" name="links4" value="{{$data['links4']}}" />
        </div>
        <div class="form-group mb-3">
            <label>Movie Links Expired4</label>
            <input type="text" class="form-control" name="expired4" value="{{$data['expired4']}}" />
        </div>
    </div>
    
    <input type="submit" value="CONFIRM" class="btn btn-success">

</form>


@endsection