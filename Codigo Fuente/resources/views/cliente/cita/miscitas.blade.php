{{-- @extends('layouts.clienteApp')

@section('content')
@endsection --}}
@extends('layouts.clienteApp')

@section('content')

<!-- Page -->
<div class="page">
      <div class="page-header">
        <h1 class="page-title">Mis Citas </h1>
      </div>
      <div class="page-content container-fluid">
        <div id="app">
            <mis-citas :id="{{json_encode(Auth::user()->id)}}"></mis-citas>
        </div>
      </div>
    </div>

@endsection 
@section('scripts')
<script src="/js/app.js"></script>
<script>
// page is now ready, initialize the calendar...
var id=$('#userId').val();
</script>
@endsection