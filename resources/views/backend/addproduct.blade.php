<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add Product') }}
        </h2>
    </x-slot>



   <div class="container card my-3">
    <div class="container my-3">
      @if (session('success'))
    <div class="alert alert-primary alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>Success!</strong> {{session('success')}}
    </div>
    @endif
    @if (session('failed'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <strong>Unsuccessful!</strong> {{session('failed')}}
    </div>
    @endif
    </div>
  
    <h3 class="text-center py-3" style="font-size: 24px;">{{Route::currentRouteName()}} {{$product->id ?? ''}}</h3>
    <form action="{{ null }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Product Name</label>
            <input type="text" name="name" value="{{$product->name ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
            <small><span class="text-danger"> @error('name') {{$message}} @enderror </span></small>
          </div>
          <div class="mb-3">
              <label for="" class="form-label">Product Quantity</label>
              <input type="text" name="quantity" value="{{$product->quantity ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small><span class="text-danger"> @error('quantity') {{$message}} @enderror </span></small>
            </div>
      
            <div class="mb-3">
              <label for="" class="form-label">Product Price</label>
              <input type="text" name="price" value="{{$product->price ?? ''}}" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small><span class="text-danger"> @error('price') {{$message}} @enderror </span></small>
            </div>
      
            <div class="mb-3">
              <label for="" class="form-label">Choose file</label>
              <input type="file" class="form-control" name="image" id="" placeholder="" aria-describedby="fileHelpId" multiple>
            </div>
            <button type="submit" class="btn btn-primary text-dark">Submit</button>
    </form>
   </div>
</x-app-layout>