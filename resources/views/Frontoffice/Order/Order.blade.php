@extends('FrontOfficeLayout.app')
@section('content')
@include('Frontoffice.shared.sign')
@include('Frontoffice.shared.nav')

<main class="page-wrapper">
    <div class="container pt-4 pb-3 py-sm-4">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Cart</li>
            </ol>
        </nav>
        <div class="rounded-3 shadow-lg mt-4 mb-5">
            <ul class="nav nav-tabs nav-justified mb-4">
                <li class="nav-item"><a class="nav-link fs-lg fw-medium py-4 active" href="{{ route('order') }}">1. Your order</a></li>
                <li class="nav-item"><a class="nav-link fs-lg fw-medium py-4" href="{{ route('checkout') }}">2. Checkout</a></li>
            </ul>
            <div class="px-3 px-sm-4 px-xl-5 pt-1 pb-4 pb-sm-5">
                <div class="row">
                    <!-- Items in cart-->
                    <div class="col-lg-8 col-md-7 pt-sm-2" id="cart-items">
                        <!-- Les articles du panier seront ajoutés ici dynamiquement -->
                    </div>
                    <!-- Sidebar-->
                    <div class="col-lg-4 col-md-5 pt-3 pt-sm-4">
                        <div class="rounded-3 bg-secondary px-3 px-sm-4 py-4" id="cart-total">
                            <div class="text-center mb-4 pb-3 border-bottom">
                                <h3 class="h5 mb-3 pb-1">Total</h3>
                                <h4 class="fw-normal" id="total-price">$0.00</h4>
                            </div>
                            <a class="btn btn-primary btn-shadow d-block w-100 mt-4 mb-3" href="{{ route('checkout') }}">
                                <i class="ci-card fs-lg me-2"></i>Proceed to Checkout
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Footer-->
@include('Frontoffice.shared.footer')

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const cartItemsContainer = document.getElementById('cart-items');
        const totalPriceElement = document.getElementById('total-price');

        // Récupérer les articles du panier
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalPrice = 0;

        // Afficher chaque article du panier
        cart.forEach((item, index) => {
            // Vérification des propriétés de l'article
            if (item.image && item.name && item.sellPrice && item.ingredients && item.quantity) {
                const itemElement = document.createElement('div');
                itemElement.classList.add('d-sm-flex', 'justify-content-between', 'align-items-center', 'mt-3', 'mb-4', 'pb-3', 'border-bottom');
                itemElement.innerHTML = `
                    <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                        <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#">
                            <img src="${item.image}" width="120" alt="${item.name}">
                        </a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2"><a href="#">${item.name}</a></h3>
                            <div class="fs-sm"><span class="text-muted me-2">${item.ingredients.join(', ')}</span></div>
                            <div class="fs-lg text-accent pt-2">$${item.sellPrice}</div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width: 9rem;">
                        <label class="form-label" for="quantity${index}">Quantity</label>
                        <input class="form-control" type="number" id="quantity${index}" value="${item.quantity}" min="1" onchange="updateQuantity(${index}, this.value)">
                        <button class="btn btn-link px-0 text-danger" type="button" onclick="removeFromCart(${index})">
                            <i class="ci-close-circle me-2"></i><span class="fs-sm">Remove</span>
                        </button>
                    </div>
                `;
                cartItemsContainer.appendChild(itemElement);
                totalPrice += parseFloat(item.sellPrice) * item.quantity; // Use sellPrice to calculate the total
            }
        });

        // Afficher le prix total
        totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
    });

    function updateQuantity(index, quantity) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart[index].quantity = parseInt(quantity, 10);
        localStorage.setItem('cart', JSON.stringify(cart));
        updateTotalPrice(); // Update the total price after changing quantity
    }

    function updateTotalPrice() {
        const cart = JSON.parse(localStorage.getItem('cart')) || [];
        let totalPrice = 0;

        cart.forEach(item => {
            totalPrice += parseFloat(item.sellPrice) * item.quantity;
        });

        document.getElementById('total-price').textContent = `$${totalPrice.toFixed(2)}`; // Update total price display
    }

    function removeFromCart(index) {
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        cart.splice(index, 1); // Supprimer l'article par index
        localStorage.setItem('cart', JSON.stringify(cart));
        location.reload(); // Rafraîchir la page pour mettre à jour l'affichage
    }
</script>
@endsection
