@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
       <a class="btn btn-primary" href="{{route('admin.apartments.create')}}">Add a new apartment</a>
        <ul class="list-unstyled py-2">
            @foreach($apartments as $apartment)
                    <li class="">
                        <a href="{{route('admin.apartments.show', $apartment)}}">{{$apartment->title}}</a>
                    </li>

            @endforeach
        </ul>

    </div>
</section>
@endsection