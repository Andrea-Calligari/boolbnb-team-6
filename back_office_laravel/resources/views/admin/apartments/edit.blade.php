@extends('layouts.app')
@section('content')

<section class="py-5">
    <div class="container">
        <h1>Edit an apartment</h1>
        <form action="{{route('admin.apartments.update', $apartment->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" id="title"
                    placeholder="Insert title" value="{{ old('title', $apartment->title) }}">
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <input type="text" name="address" class="form-control" id="address"
                    placeholder="Insert address" value="{{ old('address', $apartment->address) }}">
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"
                    placeholder="Insert description">{{ old('description', $apartment->description) }}</textarea>
            </div>

            <div class="mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="">-- Select Category --</option>
                    @foreach ($categories as $category)
                        <option @selected($category->id == old('category_id', $apartment->category_id)) value="{{ $category->id }}"> {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="rooms_number" class="form-label">Number of rooms</label>
                <input type="number" min="0" max="50" step="1" name="rooms_number"
                    class="form-control" id="rooms_number" placeholder="Insert rooms number"
                    value="{{ old('rooms_number', $apartment->rooms_number) }}">
            </div>

            <div class="mb-3">
                <label for="beds_number" class="form-label">Number of beds</label>
                <input type="number" min="0" max="50" step="1" name="beds_number"
                    class="form-control" id="beds_number" placeholder="Insert beds number"
                    value="{{ old('beds_number', $apartment->beds_number) }}">
            </div>

            <div class="mb-3">
                <label for="baths_number" class="form-label">Number of bathrooms</label>
                <input type="number" min="0" max="50" step="1" name="baths_number"
                    class="form-control" id="baths_number" placeholder="Insert bathrooms number"
                    value="{{ old('baths_number', $apartment->baths_number) }}">
            </div>

            <div class="mb-3">
                <label for="mtq" class="form-label">Total square meters</label>
                <input type="number" min="0" max="2000" step="1" name="mtq"
                    class="form-control" id="mtq" placeholder="Insert square meters"
                    value="{{ old('mtq', $apartment->mtq) }}">
            </div>

            <div class="my-3">
                <div class="form-label">Services</div>
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($services as $service)
                        <div>
                            <input type="checkbox" name="services[]" value="{{ $service->id }}" id="service_{{ $service->id }}" 
                            @if(is_array(old('services')) && in_array($service->id, old('services'))) checked @endif>
                            <label for="service_{{ $service->id }}" class="p-2 rounded d-inline-block">
                                {{$service->name}}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" min="0,00" max="9999,99" step="0.01" name="price"
                    class="form-control" id="price" placeholder="Insert price"
                    value="{{ old('price', $apartment->price) }}">
            </div>

            <div class="mb-3">
                <label for="image[]" class="form-label">Pictures</label>
                <input class="form-control" type="file" name="image[]" id="image[]" multiple>
            </div>

            <div class="my-3">
                <div class="form-label">Promotions</div>
                <div class="d-flex flex-wrap gap-3">
                    @foreach ($promotions as $promotion)
                        <div>
                            <input type="checkbox" name="promotions[]" value="{{ $promotion->id }}" id="{{ 'promotion_' . $promotion->id }}">
                            <label for="{{ 'promotion_' . $promotion->id }}" class="p-2 rounded d-inline-block">{{ $promotion->title }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
             
            <button class="btn btn-primary">Edit</button>

        </form>
    </div>
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
</section>

@endsection