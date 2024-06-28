@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
        <ul class="list-unstyled ">
            @foreach($apartments as $apartment)
                    <li class="">{{$apartment->title}}</li>

            @endforeach
        </ul>

    </div>
</section>
@endsection