@extends('layouts.app')
@section('content')
<section class="py-5">
    <div class="container">
        <div class="card text-center">
            <div class="card-header">
                <div class="card-img-top">
                    <img src="{{asset($apartment->image)}}" alt="Apartment-image" class="w-50">
                </div>
               <h1>{{$apartment->title}}</h1>
               <h4>{{$apartment->slug}}</h4>
               <h3>Address: {{$apartment->address}}</h3>
               <h3>{{$apartment->price}}&euro;</h3>
            </div>
            <div class="card-body">
               <p> Description: {{$apartment->description}}</p>
               <p>Rooms: {{$apartment->rooms_number}}</p>
               <p>Beds: {{$apartment->beds_number}}</p>
               <p>Baths: {{$apartment->baths_number}}</p>
               <p>Square-meter{{$apartment->mtq}}</p>
               <p>{{$apartment->visible}}</p>
               <div>{{$apartment->category->name}}</div>
               <div class="buttons d-flex gap-2 justify-content-center align-itmes-center mt-3">
                <button class="btn btn-outline-danger">Trash</button>
                <a class="btn btn-outline-warning" href="{{ route('admin.apartments.edit', $apartment) }}">Edit</a>
               </div>
                
            </div>
        </div>
    </div>
</section>

@endsection
