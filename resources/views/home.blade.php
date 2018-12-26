@extends('layouts.app')

@section('content')

                <h1 class="panel-heading text-center "><span class="label label-primary">Nearby Shops</span></h1>
               <a href="{{ url('preferedshop') }}" class="btn btn-default pull-right ">My Prefered Shops</a>
               <br><br><hr>
               @if (session('success'))
               <div class="alert alert-success">
                   <li>{{ session('success') }}</li>
               </div>
           @endif
                
            
                <div class="container">
                    <div class="row">
                                @foreach($shops as $shop)
                                    @if ($shop->liked == 0)
                                   <form method="POST" action="{{ url('shop/'.$shop->id) }}" enctype="multipart/form-data">
                                    <input type="hidden" name="_method" value="PUT">
                                    {{ csrf_field() }}
                                            <div class="col-sm-6 col-md-4">
                                            <div class="thumbnail">
                                                <img src="{{ asset('storage/'.$shop->photo) }}" style="" alt="Shop">
                                                <div class="caption">
                                                <h3>Shop Name : {{ $shop->name }}</h3>
                                                <h3>Distance : {{ $shop->distance }}</h3>
                                               
                                                <p>
                                                    <span class="btn btn-danger">
                                                    <a href="#" style="color: blanchedalmond"  role="button">Dislike</a>
                                                    </span> 
                                                   <button type="submit" class="btn btn-success">Like</button>
                                                </p>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                    @endif
                                @endforeach    
                            </div>
                        </div>                
               
                       
@endsection
