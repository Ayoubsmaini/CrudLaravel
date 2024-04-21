<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M205 Controle</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    <div class="container mt-5">
        <div class="row justify-content-center">

            <div class="col-md-10">
                @if (Session::has('success'))
                    <div class="alert alert-success mt-4">
                        {{ Session::get('success') }}

                    </div>
                @endif
                <div class="card border-1">
                    <div class="card-header  d-flex justify-content-between bg-secondary text-light">
                        <h3>Products</h3>
                        <a href="{{ route('products.create') }}" class="btn btn-light text-secondary">Create</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>ID</th>
                                <th></th>
                                <th>Name</th>
                                <th>SKU</th>
                                <th>Price</th>
                                <th>Created at</th>
                                <th>Action</th>
                            </tr>
                            @if ($products->isNotEmpty())
                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            @if($product->image !="" )
                                            <img width="50" src='{{asset('uploads/products/'.$product->image)}}'>
                                            @endif
                                        </td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->sku }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td>{{ \Carbon\Carbon::parse($product->created_at)->format('d M,Y') }}</td>
                                        <td>
                                            <a href="{{route('products.edit',$product->id)}}" class="btn btn-dark">Edit</a>
                                            <a href="" class="btn btn-danger">Delete</a>

                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
