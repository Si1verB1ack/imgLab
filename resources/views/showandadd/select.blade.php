<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        {{-- custom css --}}
        <link rel="stylesheet" href="{{asset('css/app.css')}}"/>
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body class="px-5 mt-2">
    @if(session()->has('message'))
    <div class="alert alert-info">
        {{ session('message') }}
    </div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-danger alert-dismissible" role="alert">
        {{ session('error') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="col-10 mt-3">
                <h1>All Product</h1>
            </div>
            <div class="col-2 mt-3">
                <a href="{{route('add')}}" class="btn btn-info p-2" style="width:150px">Add new Product</a>
            </div>
            @foreach ($products as $pro)
            <div class="col-3 mt-3">
                <div class="card text-center cardhover mb-3" style="max-width: 18rem;">
                    <img class="card-img-top" src="{{ asset('storage/'.$pro->image)}}" alt="Card image cap">
                    <div class="card-body text-dark">
                        <h5 class="card-title">{{$pro->name}}</h5>
                        <p class="card-text">{{substr($pro->description,0,50)}}</p>
                        <b><h5 class="card-title">{{$pro->price}}</h5></b>
                        <a href="{{route('detail',$pro->id)}}" class="stretched-link"></a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</body>
</html>

{{--     <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">QuantityInStock</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($products as $pro)
               <tr>
                    <th scope="row">{{$pro->id}}</th>
                    <td>{{$pro->Name}}</td>
                    <td>{{substr($pro->Description,0,50)}}</td>
                    <td>{{$pro->Price}}</td>
                    <td>{{$pro->QuantityInStock}}</td>
                    <td><a href="{{route('detail',$pro->id)}}" class="btn btn-info">Edit</a></td>
                </tr>
            @endforeach
        </tbody>
      </table> --}}
