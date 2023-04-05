<div class="card mt-lg-5">
    <div class="card-header">
        Add Product
    </div>
    <div class="card-body">
        <div class="alert alert-success" role="alert" id="successMsg" style="display: none" >
            Product successfully added!
        </div>
        <form id="product-form">
            @csrf
            <input type="hidden" id="productId">
            <div class="form-group p-2">
                <label for="name" class="mb-1">Product Name</label>
                <input type="name" class="form-control" id="name" placeholder="Enter Product Name">
                <span class="text-danger" id="nameErrorMsg"></span>
            </div>
            <div class="form-group p-2">
                <label for="quantity" class="mb-1">Quantity in Stock</label>
                <input type="number" class="form-control" name="quantity" id="quantity" placeholder="Enter Quantity">
                <span class="text-danger" id="quantityErrorMsg"></span>
            </div>
            <div class="form-group p-2">
                <label for="price" class="mb-1">Price per Item</label>
                <input type="number" class="form-control" name="price" id="price" placeholder="Enter Price">
                <span class="text-danger" id="priceErrorMsg"></span>
            </div>
            <button type="submit" class="btn btn-primary mt-3 mr-3">Submit</button>
        </form>
    </div>
</div>
