<div>

       <!-- Start breadcrumb section -->
       <div class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Shopping Cart</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End breadcrumb section -->

     <!-- cart section start -->
     <section class="cart__section section--padding">
        <div class="container-fluid">
            <div class="cart__section--inner">
                <form action="#"> 
                    <h2 class="cart__title mb-35">Shopping Cart</h2>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="cart__table">
                                <table class="cart__table--inner">
                                    <thead class="cart__table--header">
                                        <tr class="cart__table--header__items">
                                            <th class="cart__table--header__list">Product</th>
                                            <th class="cart__table--header__list">Price</th>
                                            <th class="cart__table--header__list">Quantity</th>
                                            <th class="cart__table--header__list">Total</th>
                                        </tr>
                                    </thead>

                                    <tbody class="cart__table--body">
                                        @forelse($cart as $cartItem)
@if ($cartItem->product)


                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="cart__product d-flex align-items-center">
                                
                                                    <button type="button" wire:loading.attr="disabled" wire:click="removeCartItem({{ $cartItem->id }})"   class="cart__remove--btn" aria-label="search button" type="button">
                                                        <span wire:loading.remove wire:target="removeCartItem({{ $cartItem->id }})"> 
                                                            <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24" width="16px" height="16px"><path d="M 4.7070312 3.2929688 L 3.2929688 4.7070312 L 10.585938 12 L 3.2929688 19.292969 L 4.7070312 20.707031 L 12 13.414062 L 19.292969 20.707031 L 20.707031 19.292969 L 13.414062 12 L 20.707031 4.7070312 L 19.292969 3.2929688 L 12 10.585938 L 4.7070312 3.2929688 z"/></svg>
                                                        </span>
                
                                                        <span wire:loading wire:target="removeCartItem({{ $cartItem->id }})"> 
                                                        <i class="fa fa-trash"></i> Removing
                                                        </span>
                
                                                                    </button>
                                                    <div class="cart__thumbnail">
                                                        <a href="{{ url('collections/'.$cartItem->product->category->slug.'/'.$cartItem->product->slug) }}">
                                                            @if($cartItem->product->productImages)
                                                            <img class="border-radius-5" src="{{ asset($cartItem->product->productImages[0]->image) }}" alt="cart-product">
                                                            @else
                                                            <img src="" 
                                                            style="width: 50px; height: 50px" alt="">
                                                            @endif
                                                         
                                              
                                                        </a>

   
                                                    </div>
                                                    <div class="cart__content">
                                                        <h3 class="cart__content--title h4"><a href="product-details.html">   {{ $cartItem->product->name }}</a></h3>                                
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">{{ $cartItem->product->selling_price }}</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <div class="quantity__box">
                                                    <button type="button" class="quantity__value quickview__value--quantity decrease" wire:loading.attr="disabled" wire:click="decrementQuantity({{ $cartItem->id }})">-</button>
                                                    <label>
                                                        <input type="number" class="quantity__number quickview__value--number" value="{{$cartItem->quantity }}" data-counter />
                                                    </label>
                                                    <button type="button" class="quantity__value quickview__value--quantity increase" wire:loading.attr="disabled" wire:click="incrementQuantity({{ $cartItem->id }})">+</button>
                                                </div>

                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price end">{{ $cartItem->product->selling_price * $cartItem->quantity }}</span>
                                                @php $totalPrice += $cartItem->product->selling_price * $cartItem->quantity  @endphp
                                            </td>
                                        </tr>
                                        @endif
                                        @empty
                <div>No Cart Items available</div>
                @endforelse  
                                    </tbody>
                                </table> 
                                <div class="continue__shopping d-flex justify-content-between">
                                    <a class="continue__shopping--link" href="{{ url('/collections') }}">Continue shopping</a>
                    
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="cart__summary border-radius-10">
                       
                                <div class="cart__note mb-20">
                                    <h3 class="cart__note--title">Note</h3>
                                    <p class="cart__note--desc">Add special instructions for your seller...</p>
                                    <textarea class="cart__note--textarea border-radius-5"></textarea>
                                </div>
                                <div class="cart__summary--total mb-20">
                                    <table class="cart__summary--total__table">
                                        <tbody>
                                            <tr class="cart__summary--total__list">
                                                <td class="cart__summary--total__title text-left">SUBTOTAL</td>
                                                <td class="cart__summary--amount text-right">${{ $totalPrice  }}</td>
                                            </tr>
                                    
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cart__summary--footer">
                                    <p class="cart__summary--footer__desc">Shipping & taxes calculated at checkout</p>
                                    <ul class="d-flex justify-content-between">
                             
                                        <li><a class="cart__summary--footer__btn primary__btn checkout" href="{{ url('/checkout') }}">Check Out</a></li>
                                    </ul>
                                </div>
                            </div> 
                        </div>
                    </div> 
                </form> 
            </div>
        </div>     
    </section>
    <!-- cart section end -->


</div>
