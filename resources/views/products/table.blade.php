<div class="card mt-lg-5 mb-5">
    <div class="card-header">
        Products
    </div>
    <div class="card-body">
        <table class="table table-striped" id="products-table">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity in Stock</th>
                <th scope="col">Price Per Item</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">Total Value</th>
                <th scope="col">Action(s)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->quantity }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>{{ $product->quantity * $product->price }}</td>
                    <td><button class="btn btn-sm btn-warning editBtn" value="{{ $product->id }}">Edit</button></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
