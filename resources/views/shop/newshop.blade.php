
@extends('layouts.app')

@section('content')

<div class="form-group container">
    <div class="row">
        <form action="{{url('shop')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}     
            <input type="text" name="name" class="form-control" placeholder="Name">
            <input type="text" name="distance" class="form-control" placeholder="Distance">
            <label for="">Image</label>
            <input class="form-control" type="file" name="photo" >
            <input type="submit" class="form-control btn btn-primary" value="Submit">
        </form>     
    </div>
</div>
@endsection