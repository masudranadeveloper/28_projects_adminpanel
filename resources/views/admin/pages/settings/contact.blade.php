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

<form method="post" action="{{ route('admin_settings_contact_links_add_api') }}" enctype="multipart/form-data">

    <div class="form-group mb-3">
        <label>Contact us</label>
        <input type="text" class="form-control" name="links" value="{{ $data['links'] }}" />
    </div>

    <input type="submit" value="CONFIRM" class="btn btn-success">

</form>


@endsection
