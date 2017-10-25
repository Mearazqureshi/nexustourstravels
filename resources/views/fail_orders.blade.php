@extends('layouts.app')

@section('content')
<style>
.flex-center{
    align-items: center;
    display: flex;
    justify-content: center;
}
.full-height{
    height: 50vh;
}
.title{
    font-size: 30px;
}
</style>
<div class="flex-center position-ref full-height">
  <div class="content">
    <div class="title m-b-md">
        Due to some error we unable to process your payment. Please try again.
    </div>
  </div>
</div>
@endsection
