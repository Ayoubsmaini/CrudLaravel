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

    <div class="container mt-2">
        <div class="row d-flex justify-content-center">
            <div class="col-md-4">
                <div class="card border-1">
                    <div class="card-header d-flex justify-content-between bg-secondary text-light">
                        <h3>Create</h3>
                        <a href="{{ route('products.index') }}" class="btn btn-light text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-arrow-left" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8" />
                            </svg>Back</a>
                    </div>
                    <form enctype="multipart/form-data" action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="mb-3">
                                <label class="form-label h5">Name</label>
                                <input value="{{ old('name') }}" type="text"
                                    class="   @error('name') is-invalid @enderror  form-control form-control-lg"
                                    placeholder="Name" name='name'>
                                @error('name')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h5">Sku</label>
                                <input value="{{ old('sku') }}" type="text"
                                    class=" @error('sku') is-invalid @enderror  form-control form-control-lg"
                                    placeholder="Sku" name='sku'>
                                @error('sku')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h5">Price</label>
                                <input value="{{ old('price') }}" type="text"
                                    class=" @error('price') is-invalid @enderror form-control form-control-lg"
                                    placeholder="Price" name='price'>
                                @error('price')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h5">Descrption</label>
                                <textarea class=" @error('description') is-invalid @enderror form-control" name="description" cols="30"
                                    rows="2">{{ old('description') }}</textarea>
                                @error('description')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label h5">Image</label>
                                <input type="file"
                                    class="@error('image') is-invalid @enderror form-control form-control-lg"
                                    name='image'>
                                @error('image')
                                    <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="d-grid">
                                <button class="btn btn-lg btn btn-dark">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
