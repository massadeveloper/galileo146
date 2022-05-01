@extends('layouts.app')

@section('content')
    <section class="px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
        <div class="container">
            <h1>Candidatura</h1>
        </div>
    </section>
    <section>
        
            <div class="container">
                {{__("Your application is ") }}
                <p>&nbsp;</p>
                @if(!empty($user))
                    <h1><b>{{$user->job}}</b></h1>
                @endif
            </div>
        
        @if(!empty($items))
        <div class="container">
           
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Date</th>
                  </tr>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($items as $key => $value)
                  <tr>
                    <th scope="row" id="{{$value->id}}">{{$i++}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{$value->created_at}}</td>
                 
                  </tr>
                  @endforeach
                </tbody>
              </table>
          
        </div>
       
        @endif
       <p>&nbsp;</p>
    </section>
   

@stop

