@extends('admin.layout.master')
@section('admin_master')

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

<div class="card text-center">
    <div class="card-header">
        ADD LINK
    </div>
    <div class="card-body">
        <form action="{{ route('admin_add_links_api') }}" method="post">
            <input type="text" class="form-control" placeholder="Add your link..." name="links" value="{{ $data['links'] }}" required />

            <input type="submit" value="CONFIRMED" class="btn btn-success mt-3">
        </form>
    </div>
    <div class="card-footer text-muted">
        Last Update
    </div>
</div>

@endsection
