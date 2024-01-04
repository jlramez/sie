@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <livewire:show-amparos :exp="$exp">
        </div>     
    </div>   
</div>
@endsection