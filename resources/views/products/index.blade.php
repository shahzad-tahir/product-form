@extends('layout.app')
@section('content')
    @include('products.create')
    @include('products.table', ['products' => $products])
@endsection
@section('js')
    <script>
        $(document).ready(function ($) {
            $('#product-form').on('submit', function (e) {
                e.preventDefault();
                let name = $('#name').val();
                let quantity = $('#quantity').val();
                let price = $('#price').val();
                let id = $('#productId').val();

                if ($('#productId').val() === '') {
                    storeProduct(name, quantity, price);
                } else {
                    updateProduct(id, name, quantity, price);
                }
            });

            $('.editBtn').on('click', function (e) {
                let productId = $(this).val();
                var url = '{{ route("products.edit", ":id") }}';
                url = url.replace(':id', productId);

                $.ajax({
                    url: url,
                    type: "GET",
                    dataType: "json",
                    success: function (response) {
                        $('#name').val(response.product.name);
                        $('#quantity').val(response.product.quantity);
                        $('#price').val(response.product.price);
                        $('#productId').val(response.product.id);
                    }
                });

            });
        });

        function storeProduct(name, quantity, price) {
            $.ajax({
                url: "{{ route('products.store') }}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    name: name,
                    quantity: quantity,
                    price: price
                },
                success: function (response) {
                    $('#successMsg').show();
                    refreshTableData(response);
                },
                error: function (response) {
                    throwErrorMessages(response);
                },
            });
        }

        function updateProduct(id, name, quantity, price) {
            var url = '{{ route("products.update", ":id") }}';
            url = url.replace(':id', id);

            $.ajax({
                url: url,
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "_method": "PUT",
                    name: name,
                    quantity: quantity,
                    price: price
                },
                success: function (response) {
                    location.reload();
                },
                error: function (response) {
                    throwErrorMessages(response);
                },
            });
        }

        function refreshTableData(response) {
            $("table tbody").prepend(response.row);
        }

        function throwErrorMessages(response) {
            $('#nameErrorMsg').text(response.responseJSON.errors.name);
            $('#quantityErrorMsg').text(response.responseJSON.errors.quantity);
            $('#priceErrorMsg').text(response.responseJSON.errors.price);
        }
    </script>
@endsection
