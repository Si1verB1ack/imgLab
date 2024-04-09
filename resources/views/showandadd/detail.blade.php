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

        <title>Product Sale</title>
        <link rel="icon" type="image/x-icon" href="https://assets.edlin.app/favicon/favicon.ico">

        <link rel="stylesheet" href="https://assets.edlin.app/bootstrap/v5.3/bootstrap.css">

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        {{-- Paypal --}}
        <script src="https://www.paypal.com/sdk/js?client-id={{config('paypal.client_id')}}&currency=USD&intent=capture" data-sdk-integration-source="sandbox"></script>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-10 mt-4">
                <h1>{{$product->name}}</h1>
                <img src="{{ asset('storage/'.$product->image)}}" class="img-fluid" alt="Responsive image">
            </div>
            <div class="col-2 mt-4">

                <a href="{{route('update',$product->id)}}" class="btn btn-info" style="width:100px">Update</a>

                <form action="{{ route('delete', $product->id) }}" method="POST" onsubmit="confirmation(this)">
                    @csrf
                    <button type="submit" class="btn btn-danger mt-1" style="width:100px">Delete</button>
                </form>
            </div>
            <table class="table pl-5">
                <tbody>
                        <tr>
                            <td scope="row">Description: {{$product->description}}</td>
                        </tr>
                        <tr>
                            <td scope="row">Price: {{$product->price}}$</td>
                        </tr>
                        <tr>
                            <td scope="row">Quantity In Stock: {{$product->quantity_in_stock}}</td>
                        </tr>
                        <tr>
                            <td scope="row">created at: {{$product->created_at}}</td>
                        </tr>
                        <tr>
                            <td scope="row">updated at: {{$product->updated_at}}</td>
                        </tr>
                        {{-- <tr>
                            <td>
                                <label>
                                    Enter Qty you would like to buy
                                </label>
                                <input type="number" step="1" id="quantity_in_stock" min="0" max="{{$product->quantity_in_stock}}" value="0"/>
                            </td>
                        </tr> --}}
                        {{-- <tr>
                            <td scope="row">
                                <div class="container text-center">
                                    <div class="row mt-5">
                                        <div class="col-12">
                                            <div class="row mt-3" id="paypal-success" style="display: none;">
                                                <div class="col-12 col-lg-6 offset-lg-3">
                                                    <div class="alert alert-success" role="alert">
                                                    Transaction Complete
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-lg-6 offset-lg-3">
                                                    <div class="input-group">
                                                    <span class="input-group-text"> Total : </span>
                                                        <input type="text"
                                                                readonly
                                                                class="form-control"
                                                                id="paypal-amount"
                                                                value="0">
                                                        <span class="input-group-text">.00 $</span>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mt-3">
                                                <div class="col-12 col-lg-6 offset-lg-3" id="payment_options"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr> --}}
                </tbody>
            </table>
        </div>
    </div>
    <script>
        paypal.Buttons({
          createOrder: function () {
            return fetch("/create/" + document.getElementById("paypal-amount").value)
              .then((response) => response.text())
              .then((id) => {
                return id;
              });
          },

          onApprove: function () {
            return fetch("/complete", {method: "post", headers: {"X-CSRF-Token": '{{csrf_token()}}'}})
              .then((response) => response.json())
              .then((order_details) => {
                console.log(order_details);
                Swal.fire({
                title: "Transaction Complete",
                text: "Thank you for purchasing!",
                icon: "success"
                });
                // document.getElementById("paypal-success").style.display = 'block';
                //paypal_buttons.close();
              })
              .catch((error) => {
                console.log(error);
              });
          },

          onCancel: function (data) {
            //todo
          },

          onError: function (err) {
            //todo
            console.log(err);
          }
        }).render('#payment_options');
    </script>
    <script type="text/javascript">
        function confirmation(form) {
            event.preventDefault(); // Prevent form submission

            var urlToRedirect = form.action; // Get URL from form action attribute

            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        icon: "success"
                    }).then(() => {
                        form.submit(); // Submit the form after the user clicks "OK"
                    });
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    Swal.fire({
                        title: "Cancelled",
                        text: "Your imaginary file is safe :)",
                        icon: "error"
                    });
                }
            });
        }
        document.getElementById("qtyOrder").addEventListener("input", function() {
        var qtyOrderValue = this.value; // Retrieve the value of the quantity order input
        var paypalAmountInput = document.getElementById("paypal-amount"); // Get the paypal amount input

        // Update the value of the paypal amount input
        paypalAmountInput.value = qtyOrderValue * {{$product->price}};
        });
    </script>
</body>
</html>

