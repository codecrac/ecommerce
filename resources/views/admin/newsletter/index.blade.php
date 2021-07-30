@extends('admin.includes2')

@section('body')

    <div class="content-wrapper">
        <div class="page-header">

        </div>
        <div class="card">
            <div class="card-body">
                {!! Session::get('message','') !!}
                <h2 class="card-title"> Newsletter </h2>
        </div>
    </div>
@endsection

@section('script_complementaire')
    <script src="{{asset('purple_template/vendors/datatables.net/jquery.dataTables.js')}}"></script>
    <script src="{{asset('purple_template/vendors/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
    <script src="{{asset('purple_template/js/data-table.js')}}"></script>
@endsection
