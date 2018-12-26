
@extends('layouts.app')

@section('content')
<nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <form class="navbar-form navbar-left" >
                <a href="{{url('shop/create')}}" class="btn btn-success ">New Shop</a>
            </form>
        </div>
      
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            
            
          
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>

                     @if (session('success'))
                        <div class="alert alert-success">
                            <li>{{ session('success') }}</li>
                        </div>
                    @endif
                
   
                        <div class="container">
                                <div class="row">
                                    @foreach($shops as $shop)
    
                                    
                                        <div class="col-sm-6 col-md-4">
                                          <div class="thumbnail">
                                            <img src="{{ asset('storage/'.$shop->photo) }}" alt="...">
                                            <div class="caption">
                                              <h3>Shop Name : {{ $shop->name }}</h3>
                                             <h3>Distance : {{ $shop->distance }}</h3>
                                             <form action="{{url('shop/'.$shop->id)}}" method="POST">
                                              {{ csrf_field() }}
                                              {{ method_field('DELETE') }}
                                              <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item?')" >Supprimer</button>
                                            </form>
                                            </div>
                                          </div>
                                        
                                      </div>
                                      
                                    @endforeach
                                </div>
                        </div>
                      
                   
                
@endsection