<tr>
    <td>{{ $product->id }}</td>
    <td>{{ $product->name }}</td>
    <td>{{ $product->quantity }}</td>
    <td>{{ $product->price }}</td>
    <td>{{ $product->created_at }}</td>
    <td>{{ $product->quantity * $product->price }}</td>
    <td><button class="btn btn-sm btn-warning editBtn" value="{{ $product->id }}">Edit</button></td>
</tr>
