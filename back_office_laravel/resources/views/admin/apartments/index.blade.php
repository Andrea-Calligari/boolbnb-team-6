@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
        <ul class="list-unstyled ">
            @foreach($apartments as $apartment)
                    <li class="">
                        <a href="{{route('admin.apartments.show', $apartment)}}">{{$apartment->title}}</a>
                    </li>

            @endforeach
        </ul>

    </div>
</section>
@endsection