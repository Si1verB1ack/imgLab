<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

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

        <form method="POST" action="{{route('updatesave',$product->id)}}" onsubmit="confirmation(this)">
            @csrf
            <div class="mb-3">
                <label for="text" class="form-label">Name</label>
                <input type="name" class="form-control" id="name" name="name" value="{{$product->name}}">

                <label for="description" class="form-label">Description</label>
                <textarea type="text" class="form-control" id="description" name="description">{{$product->description}}</textarea>

                <label for="price" class="form-label">Price</label>
                <input type="text" class="form-control" id="price" name="price" value="{{$product->price}}">

                <label for="quantity_in_stock" class="form-label">Qty</label>
                <input type="text" class="form-control" id="quantity_in_stock" name="quantity_in_stock" value="{{$product->quantity_in_stock}}">

                <label for="categoryid" class="form-label">Category</label>
                <select class="form-select" name="categoryid">
                    @foreach ($categories as $cate)
                        <option
                            @if ($product->categoryid == $cate->id)
                                selected
                            @endif
                        value="{{$cate->id}}">{{$cate->name}}</option>
                    @endforeach
                </select>
                <br>
                <button type="submit" class="btn btn-primary">Update</button>
                {{-- <button href="{{route('select')}}" class="btn btn-danger">Cancel</button> --}}
            </div>
        </form>
    </div>
    <script type="text/javascript">
        function confirmation(form) {
            event.preventDefault(); // Prevent form submission

            var urlToRedirect = form.action; // Get URL from form action attribute

            Swal.fire({
                title: "Do you want to save the changes?",
                showDenyButton: true,
                showCancelButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    Swal.fire("Saved!", "", "success").then(() => {
                    form.submit(); // Submit the form after the user clicks "OK"
                });
                } else if (result.isDenied) {
                    Swal.fire("Changes are not saved", "", "info");
                    // Handle case when user chooses not to save changes
                }
            });
        }
    </script>
</body>
</html>
