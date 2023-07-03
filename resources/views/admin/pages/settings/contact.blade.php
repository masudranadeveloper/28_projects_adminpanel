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

<form method="post" action="{{ route('admin_change_mangement_api') }}" enctype="multipart/form-data">

    <div class="form-group mb-2">
        <label>Links 1</label>
        <input type="text" class="form-control" name="links1" value="{{ $data['links1'] }}" />
    </div>
    <div class="form-group mb-4">
        <label>Img 1</label>
        <input type="file" class="form-control" name="img1" value="{{ $data['img1'] }}" />
    </div>

    <div class="form-group mb-2">
        <label>Links 2</label>
        <input type="text" class="form-control" name="links2" value="{{ $data['links2'] }}" />
    </div>
    <div class="form-group mb-4">
        <label>Img 2</label>
        <input type="file" class="form-control" name="img2" value="{{ $data['img2'] }}" />
    </div>

    <div class="form-group mb-2">
        <label>Links 3</label>
        <input type="text" class="form-control" name="links3" value="{{ $data['links3'] }}" />
    </div>
    <div class="form-group mb-4">
        <label>Img 3</label>
        <input type="file" class="form-control" name="img3" value="{{ $data['img3'] }}" />
    </div>
    <div class="form-group mt-3 mb-3">
        <label>Icons</label>
        <input type="file" class="form-control" name="logo" value="{{ $data['logo'] }}" />
    </div>

    <input type="submit" value="CONFIRM" class="btn btn-success">

</form>


@endsection
