<x-layout>
    <main>
        <section class="checkOut-s">
            <div class="container">
                <!-- row -->
                <form action="{{Route('checkouts.store')}}" method="post" class="checkOut-form">
                    @csrf
                    <div class="row">

                        <div class="col-md-7 input-check">
                            <!-- Billing Details -->
                            <div class="billing-details">

                                <div class="section-title">
                                    <h3 class="title">Billing address</h3>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="first_name" placeholder="First Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="last_name" placeholder="Last Name" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="address" placeholder="Address" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="city" placeholder="City" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="text" name="country" placeholder="Country" required>
                                </div>
                                <div class="form-group">
                                    <input class="input" type="number" name="phone" placeholder="Telephone" required min="0" max="10000000000">
                                </div>
                                <div class="order-notes">
                                    <textarea class="input" name="note" placeholder="Order Notes"></textarea>
                                </div>


                            </div>
                            <!-- /Billing Details -->

                            <!-- Shiping Details -->

                            <!-- /Shiping Details -->

                            <!-- Order notes -->

                            <!-- /Order notes -->
                        </div>

                        <!-- Order Details -->
                        <div class="col-md-5 order-details">
                            <div class="section-title text-center">
                                <h3 class="title">Your Order</h3>
                            </div>
                            <div class="order-summary">
                                <div class="order-col">
                                    <div><strong>PRODUCT</strong></div>
                                    <div><strong>TOTAL</strong></div>

                                </div>

                                <div class="order-products">

                                    @foreach ($carts->cartItems as $cart)   
                                    <input type="hidden" name="product_id[]" id="product_id" value="{{$cart->product->id}}">  
                                    <input type="hidden" name="qty[]" id="qty"  value="{{$cart->qty}}">  
                                    <input type="hidden" name="size[]" id="size"  value="{{$cart->size}}">  
                                    <input type="hidden" name="price[]" id="price"  value="{{$cart->price}}">  
                                    <div class="order-col">
                                        <div>{{$cart->qty}}x {{$cart->product->name}} ({{$cart->size}})</div>
                                        <div>
                                            {{number_format($cart->price)}} đ
                                        </div>
                                    </div>
                                    @endforeach
                                </div>

                                <div class="order-col">
                                    <div>Shiping</div>
                                    <div><strong>FREE</strong></div>
                                </div>
                                <div class="order-col">

                                    <div><strong>TOTAL</strong></div>

                                    <div><strong class="order-total" style="font-size: 20px;">{{number_format($carts->total_price)}} đ</strong></div>

                                </div>
                            </div>

                            <input type="submit" class="primary-btn order-submit" value="Place order" name="btn-oder"
                                style="margin-left: 130px;" onclick="showMessage()">
                        </div>
                        <!-- /Order Details -->
                    </div>
                </form>
                <!-- /row -->
            </div>
        </section>
    </main>
    <script>
        function showMessage() {
            alert('Đã thành công!');
        }
    </script>
</x-layout>
