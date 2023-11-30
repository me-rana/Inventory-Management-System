<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="container card my-3">
      <div class="container my-3">
        @if (session('success'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
      <h3 class="text-center my-5" style="font-size: 24px">Product List</h3>
    
       <div style="overflow-x: auto;">
        <table class="table">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Name</th>
              <th scope="col">Quantity</th>
              <th scope="col">Price</th>
              <th scope="col">Image</th>
              <th scope="col">Action Modified</th>
              <th scope="col">Action Removal</th>
            </tr>
          </thead>
          <tbody>
            @if($products->count() > 0)
            @php
              $i = 1;
            @endphp
                @foreach($products as $product)
                 <tr>
                    <th scope="row">{{$i++}}</th>
                    <td>{{$product->name}}</td>
                    <td>{{$product->quantity}}</td>
                    <td>৳{{$product->price}}</td>
                    <td><img src="{{$product->image_path ?? 'storage/products/no-image.jpeg'}}" width="100px"></td>
                    <td><a href="../../update-product/{{$product->id}}"><button class="btn btn-danger">Modifiy</button></a></td>
                    <td><a href="../../delete-product/{{$product->id}}"><button class="btn btn-danger">Remove</button></a></td>
                 </tr> 
                @endforeach
            @endif
          </tbody>
        </table>
      </div>

    </div>
</x-app-layout>