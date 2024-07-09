<x-guest-layout>
    <section class="shopping-cart dark">
        @if($cart)
            
       
            
        
        <div class="container">
            <div class="block-heading">
                <h2 class="cart_title">Your Order</h2>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        <div class="items">
                            @php
                                $initialSubtotal = 0;
                            @endphp
                            @forelse ($cart as $itemId => $cartItem)
                                @php
                                    $itemTotal = $cartItem['item']->price * $cartItem['quantity'];
                                    $initialSubtotal += $itemTotal;
                                @endphp
                                <div class="product" data-item-total="{{ $itemTotal }}" data-item-id="{{ $itemId }}">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="cart_image-container">
                                                <img src="{{ url('public/menus/' . $cartItem['item']->image) }}"
                                                    class="card-img-top rounded-image"
                                                    alt="{{ $cartItem['item']->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-5 product-name">
                                            <div class="product-name">
                                                <a href="#">
                                                    <div>{{ $cartItem['item']->name }}</div>
                                                </a>
                                                <div class="product-info">
                                                    <div>Price: <span
                                                            class="value">{{ '$' . number_format($cartItem['item']->price, 2) }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 total">
                                                    <span id="total{{ $itemId }}">Total Price:
                                                        {{ '$' . number_format($itemTotal, 2) }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 quantity">
                                            <label for="quantity{{ $itemId }}">Quantity:</label>
                                            <input id="quantity{{ $itemId }}" type="number"
                                                value="{{ $cartItem['quantity'] }}" min="1"
                                                class="form-control quantity-input"
                                                onchange="updateTotal({{ $itemId }}, {{ $cartItem['item']->price }})">
                                            <form action="{{ route('cart.remove', ['id' => $itemId]) }}" method="post" 
                                                onsubmit="return confirm('Are you sure you want to remove this item from your order?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger remove_item">Remove from order</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="empty-cart-message">
                                 </div>
                            @endforelse
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-4">
                        <div class="summary">
                            <h3>Summary</h3>
                            <div class="summary-item"><span class="text">Subtotal:</span><span
                                    id="subtotal">{{ '$' . number_format($initialSubtotal, 2) }}</span></div>
                            <div class="summary-item"><span class="text">Delivery Fee:</span><span
                                    id="deliveryCost">{{ '$' . ($initialSubtotal > 0 ? 5.00 : 0.00) }}</span></div>
                            <div class="summary-item"><span class="text">Total:</span><span
                                    id="grandTotal">{{ '$' . number_format($initialSubtotal + ($initialSubtotal > 0 ? 5.00 : 0.00), 2) }}</span></div>
                            <form action="{{route('payment.form')}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary btn-lg btn-block">Checkout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Function to update the total price for an item based on quantity
        function updateTotal(itemId, price) {
            const quantityInput = document.getElementById(`quantity${itemId}`);
            const quantity = parseInt(quantityInput.value);

            // Check for valid quantity
            if (!isNaN(quantity) && quantity > 0) {
                const total = quantity * price;
                document.getElementById(`total${itemId}`).textContent =
                    `Total Price: $${total.toFixed(2)}`; // Update displayed total
                document.querySelector(`.product[data-item-id="${itemId}"]`).dataset.itemTotal = total.toFixed(2);
                updateSummary(); // Update the summary totals
            }
        }

        // Function to update the summary totals
        function updateSummary() {
            let subtotal = 0;
            document.querySelectorAll('.product').forEach(product => {
                const itemTotal = parseFloat(product.dataset.itemTotal);
                if (!isNaN(itemTotal)) {
                    subtotal += itemTotal;
                }
            });

            const deliveryCost = subtotal > 0 ? 5.00 : 0.00; // Delivery fee only applies if the subtotal is greater than 0
            const grandTotal = subtotal + deliveryCost;

            document.getElementById('subtotal').textContent = `$${subtotal.toFixed(2)}`;
            document.getElementById('deliveryCost').textContent = `$${deliveryCost.toFixed(2)}`;
            document.getElementById('grandTotal').textContent = `$${grandTotal.toFixed(2)}`;
        }

        // Initialize totals on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateSummary(); // Calculate totals on initial page load
        });
    </script>
     @else

     <h2 class="cart_title empty-cart-title">Your cart is empty!</h2>
     <div class="order-now-container">
         <a class="btn btn-primary btn-lg" href="{{ route('categories.index') }}">Order Now</a>
     </div>
     
    @endif
</x-guest-layout>
