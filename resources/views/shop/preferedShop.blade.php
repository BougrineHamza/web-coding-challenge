
@extends('layouts.app')

@section('content')


      
            
      
            
                    <h1 class="text-center"><span class="label label-primary">My Prefered Shops</span></h1><br>
                        <a href="{{ url('home') }}" class="btn btn-default pull-right  ">Nerby Shops</a>
                       
                        <br><br><hr>
                        @if (session('success'))
                        <div class="alert alert-success">
                            <li>{{ session('success') }}</li>
                        </div>
                    @endif
                        <div class="container">
                        <div class="row">
                               
                                    @foreach($shops as $shop)
                                         @if ($shop->liked)
                                        
                                            <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img src="{{ asset('storage/'.$shop->photo) }}" alt="...">
                                                <div class="caption">
                                                <h3>Shop Name : {{ $shop->name }}</h3>
                                                <h3>Distance : {{ $shop->distance }}</h3>
                                                <form method="POST" action="{{ url('shop/'.$shop->id) }}" enctype="multipart/form-data">
                                                    <input type="hidden" name="_method" value="PUT">
                                                    {{ csrf_field() }}
                                                <button type="submit" class="btn btn-danger">Remove</button>
                                                </div>
                                                </form>
                                
                                            </div>
                                            </div>
                                        
                                       @endif
                                    @endforeach
                                </div>
                        </div>
        
@endsection