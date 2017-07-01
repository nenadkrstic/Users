@extends('app')
@section('content')
@include('search')
      <div class="container">
          @if($searchResults)
               <h5>Rezultat pretrage : </h5>
                @foreach($searchResults as $user)

                  <div class="container">
                      <h5>Ime: {{$user->name}}</h5>
                      <h5>mail: {{$user->email}}</h5><hr>
                  </div>

              @endforeach
          @else
              <h5>Pretraga za kriterium je prazna</h5><hr>

          @endif

    </div>
@stop