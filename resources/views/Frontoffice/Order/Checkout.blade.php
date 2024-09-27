@extends('FrontOfficeLayout.app')
@section('content')
@extends('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

<main class="page-wrapper">
    <div class="container pt-4 pb-3 py-sm-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap"><a href="food-delivery-cart.html">Cart</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Checkout</li>
            </ol>
        </nav>
        <div class="rounded-3 shadow-lg mt-4 mb-5">
            <ul class="nav nav-tabs nav-justified mb-sm-4">
                <li class="nav-item"><a class="nav-link fs-lg fw-medium py-4" href="{{ route('order') }}">1. Your order</a></li>
                <li class="nav-item"><a class="nav-link fs-lg fw-medium py-4 active" href="{{ route('checkout') }}">2. Checkout</a></li>
            </ul>

            <!-- Checkout Form -->
            <form id="yourFormId" class="needs-validation px-3 px-sm-4 px-xl-5 pt-sm-1 pb-4 pb-sm-5" method="POST" action="{{ route('storeOrder') }}" novalidate>
                @csrf

                <div class="row pb-4 pt-3">
                    <!-- User Name (Read-only) -->
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="fd-name">Your name<sup class="text-danger ms-1">*</sup></label>
                        <input class="form-control" type="text" id="fd-name" value="{{ Auth::user()->name }}" readonly>
                    </div>
                    <!-- Phone Number (Read-only) -->
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="fd-phone">Phone number<sup class="text-danger ms-1">*</sup></label>
                        <input class="form-control" type="text" id="fd-phone" value="{{ Auth::user()->tel_mobile }}" readonly>
                    </div>
                </div>

                <!-- Delivery Address -->
                <h2 class="h5 pb-3">Delivery address</h2>
                <div class="row mb-4">
                    <!-- City -->
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="fd-city">City<sup class="text-danger ms-1">*</sup></label>
                        <select class="form-select" id="fd-city" name="city" required>
                            <option value="">Select a city</option>
                            <option value="Tunis">Tunis</option>
                            <option value="Sfax">Sfax</option>
                            <option value="Sousse">Sousse</option>
                            <option value="Kairouan">Kairouan</option>
                            <option value="Bizerte">Bizerte</option>
                            <option value="Ariana">Ariana</option>
                            <option value="Soukra">Soukra</option>
                        </select>
                        <div class="invalid-feedback">Please select a city!</div>
                    </div>

                    <!-- Complete Address -->
                    <div class="col-sm-6 mb-4">
                        <label class="form-label" for="fd-address">Address<sup class="text-danger ms-1">*</sup></label>
                        <input class="form-control" type="text" placeholder="Street, Apartment number or suite" required id="fd-address" name="adresse">
                        <div class="invalid-feedback">Please enter your address!</div>
                    </div>
                </div>

                <!-- Payment Method (Status) -->
                <div class="row">
                    <div class="col-sm-6 mb-4 mb-sm-0">
                        <h2 class="h5 pb-2">Status</h2>
                        <div class="form-check form-check-inline mb-3">
                            <input class="form-check-input" type="radio" name="status" id="cash" value="cash to delivery" checked>
                            <label class="form-check-label" for="cash">Pay with cash to the courier</label>
                        </div>
                        <div class="form-check form-check-inline pb-4">
                            <input class="form-check-input" type="radio" name="status" id="sur_place" value="sur_place">
                            <label class="form-check-label" for="sur_place">Sur place</label>
                        </div>

                        <!-- Hidden field for total_amount -->
                        <input type="hidden" id="total_amount" name="total_amount" value="">

                        <button class="btn btn-primary d-block w-100 mt-3" type="submit">Complete order</button>
                    </div>

                    <!-- Total Summary -->
                    <div class="col-sm-6">
                        <div class="d-flex flex-column h-100 rounded-3 bg-secondary px-3 px-sm-4 py-4">
                            <h2 class="h5 pb-3">Your total</h2>
                            <div class="d-flex justify-content-between fs-md border-bottom pb-3 mb-3">
                                <span>Subtotal:</span>
                                <span class="text-heading" id="subtotalValue">$0.00</span>
                            </div>
                            <div class="d-flex justify-content-between fs-md border-bottom pb-3 mb-3">
                                <span>Delivery:</span>
                                <span class="text-heading" id="deliveryValue">$6.00</span>
                            </div>
                            <div class="d-flex justify-content-between fs-md mb-2">
                                <span>Total:</span>
                                <span class="text-heading fw-medium" id="totalValue">$0.00</span>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- End of Checkout Form -->
        </div>
    </div>
</main>

<!-- Footer -->
@include('Frontoffice.shared.footer')

<script>
document.addEventListener('DOMContentLoaded', function () {
    const subtotalValueElement = document.getElementById('subtotalValue');
    const totalPriceElement = document.getElementById('totalValue');
    const deliveryValueElement = document.getElementById('deliveryValue');
    let deliveryCost = 6;
    let totalPrice = 0;
    let subtotalPrice = 0;

    // Retrieve the cart from local storage
    const cart = JSON.parse(localStorage.getItem('cart')) || [];

    // Calculate subtotal and update the display
    cart.forEach((item) => {
        if (item.sellPrice && item.quantity) {
            subtotalPrice += parseFloat(item.sellPrice) * item.quantity;
        }
    });

    subtotalValueElement.textContent = `$${subtotalPrice.toFixed(2)}`;
    totalPrice = subtotalPrice + deliveryCost;
    updateTotalPrice();

    function updateTotalPrice() {
        const total = subtotalPrice + deliveryCost;
        totalPriceElement.textContent = `$${total.toFixed(2)}`;
        deliveryValueElement.textContent = `$${deliveryCost.toFixed(2)}`;
    }

    document.querySelectorAll('input[name="status"]').forEach(function (input) {
        input.addEventListener('change', function () {
            deliveryCost = this.value === 'sur_place' ? 0 : 6;
            updateTotalPrice();
        });
    });

    const form = document.getElementById('yourFormId');
    form.addEventListener('submit', function (event) {
        event.preventDefault();

        // Set the total amount
        const totalValue = totalPriceElement.textContent.replace('$', '').trim();
        document.getElementById('total_amount').value = totalValue;

        // Add cart data as a hidden field
        const cartInput = document.createElement('input');
        cartInput.type = 'hidden';
        cartInput.name = 'cart';
        cartInput.value = JSON.stringify(cart); // Convert the cart to JSON string

        form.appendChild(cartInput);

        // Clear local storage (remove cart data)
        localStorage.removeItem('cart');

        // Submit the form
        form.submit();
    });
});


</script>
@endsection
