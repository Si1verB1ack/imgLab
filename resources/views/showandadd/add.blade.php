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
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
</head>
<body>
    <div class="card mx-auto" style="width: 40rem;">
        <form method="POST" action="{{route('save')}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 p-2">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}">
                @if($errors->has('name') && !old('name'))
                    @error('name')
                    <p style="color:#aa2833;">{{ $message }}</p>
                    @enderror
                @endif

                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description">{{old('description')}}</textarea>
                @if ($errors->has('description') && !old('description'))
                    @error('description')
                        <p style="color:#aa2833;">{{ $message }}</p>
                    @enderror
                @endif

                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{old('price')}}">
                @if($errors->has('price') && !old('price'))
                    @error('price')
                        <p style="color:#aa2833;">{{ $message }}</p>
                    @enderror
                @endif
                <label for="quantity_in_stock" class="form-label">Qty</label>
                <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{old('quantity_in_stock')}}">
                @if($errors->has('quantity_in_stock') && !old('quantity_in_stock'))
                    @error('quantity_in_stock')
                        <p style="color:#aa2833;">{{ $message }}</p>
                    @enderror
                @endif

                <label for="categoryid" class="form-label">Category</label>
                <select class="form-select" name="categoryid" id="categoryid">
                    @foreach ($categories as $cate)
                        <option value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                    <label for="image" class="form-label">Choose product image</label>
                    <input type="file" name="image" id="image" class="form-control" value="{{ old('image') }}">
                <br>
                @if($errors->has('image') && !old('image'))
                    @error('image')
                        <p style="color:#aa2833;">{{ $message }}</p>
                    @enderror
                @endif
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>
</html>
