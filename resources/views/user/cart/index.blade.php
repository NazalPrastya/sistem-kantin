
@extends('user.layout.template')
@section('content')
<div class="title w-full rounded-b-sm pt-10">
    <h2 class="font-semibold text-lg md:text-xl inline ml-14"></i>Keranjangku....</h2>
</div>
@include('sweetalert::alert')
    
    @php
        $total = 0;
    @endphp
    <div class="container pt-5 space-y-2">
        <a href="/barang" class="p-1 px-2 text-lg md:text-xl text-white bg-blue-800 rounded-md hover:bg-blue-900 hover:ring-1 hover:ring-orange-600 ">Beli lagi</a>


        {{-- Start Alert --}}
        @if (session()->has('error'))    
        <div id="alert-2" class="flex p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
              Error {{ session('error') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
          @endif

        @if (session()->has('success'))    
          <div id="alert-3" class="flex p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
            <span class="sr-only">Info</span>
            <div class="ml-3 text-sm font-medium">
              Success {{ session('success') }}
            </div>
            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-3" aria-label="Close">
              <span class="sr-only">Close</span>
              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </button>
          </div>
          @endif
        {{-- End Alert --}}

        @foreach ($carts as $cart)
            

        <div class="w-full bg-[#A8A8A8] h-auto rounded-md flex flex-row py-1">
            <img src="{{ asset('storage/' . $cart->product->image) }}" alt="" class="object-cover w-28 border-r-2 m-2">
            <div class="flex flex-col gap-y-1 md:flex-row md:mx-auto md:my-auto md:gap-x-5 lg:gap-x-10">
                <p class="text-lg font-bold lg:text-2xl">{{ $cart->product->name }}</p>
                <p class="lg:text-lg">Rp.{{ $cart->product->harga }}</p>
                <div class="flex flex-row">
                    <p class="inline lg:text-lg">Jumlah : {{ $cart->qty }}</p>
                    <form method="post" action="/cart/plus/{{ $cart->id }}" class="inline ml-2">
                      @csrf
                      @method('put')
                       <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                        <input type="hidden" name="qty" value="{{ $cart->qty + 1 }}">
                        <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white hover:bg-slate-600">+</button>
                    </form>

                    <form action="/cart/min/{{ $cart->id }}" method="post" class="inline ml-2">
                      @csrf
                      @method('put')
                      <input type="hidden" name="product_id" value="{{ $cart->product_id }}">
                      <input type="hidden" name="qty" value="{{ $cart->qty - 1 }}">
                      <button type="submit" class="rounded-full px-2 bg-slate-500 text-lg text-white hover:bg-slate-600">-</button>
                  </form>
                </div>
                <p class="lg:text-lg">Subtotal : <span class="font-bold">Rp.{{ $cart->qty * $cart->product->harga }}</span></p>
                <form action="/cart/{{ $cart->id }}" method="post" class="">
                    @method('delete')
                    @csrf
                    <button type="submit" class="text-white text-base font-bold rounded-xl px-2 bg-red-600 hover:bg-red-700 hover:ring-1 hover:ring-white lg:text-lg">Cancel</button>
                </form>
            </div>
        </div>

        @php
            $total += ($cart->product->harga * $cart->qty);
        @endphp
        @endforeach

        {{-- Checkout Harga --}}
        <p class="text-end text-lg font-bold pr-3">Total belanja <span class="text-orange-500 font-extrabold">Rp.{{ number_format($total) }}</span></p>

        <div class="m-auto flex justify-center">            
                  
        <button data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-5 py-2 text-center " type="button">
          Checkout
        </button>

        <div id="popup-modal" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative w-full max-w-md max-h-full">
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center " data-modal-hide="popup-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <div class="p-6 text-center">
                        {{-- <svg aria-hidden="true" class="mx-auto mb-4 text-gray-400 w-14 h-14 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg> --}}
                        <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Pilih metode pembayaran</h3>
                        <form action="{{ route('checkout') }}" method="post" class="inline" id="checkout">
                          @csrf
                          <input type="hidden" value="{{ $total }}" name="total">
                          <button data-modal-hide="popup-modal" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2 text-center mr-2">
                            Cash
                          </button>
                        </form>
                        {{-- <form action="{{ route('midtrans') }}" method="post" class="inline">
                          @csrf
                          <input type="hidden" value="{{ $total }}" name="total_payment"> --}}
                          <button data-modal-hide="popup-modal" type="submit" class="text-white bg-primary hover:bg-oren focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2 focus:z-10 " id="pay-button">Digital Payment</button>



                          <script type="text/javascript">
                            // For example trigger on button clicked, or any time you need
                            var payButton = document.getElementById('pay-button');
                            payButton.addEventListener('click', function () {
                              // Trigger snap popup. @TODO: Replace TRANSACTION_TOKEN_HERE with your transaction token
                              window.snap.pay('{{ $snapToken }}', {
                                onSuccess: function(result){
                                  /* You may add your own implementation here */
                                  alert("payment success!"); console.log(result);
                                  submit_form();
                                },
                                onPending: function(result){
                                  /* You may add your own implementation here */
                                  alert("wating your payment!"); console.log(result);
                                  submit_form();
                                },
                                onError: function(result){
                                  /* You may add your own implementation here */
                                  alert("payment failed!"); console.log(result);
                                  submit_form();
                                },
                                onClose: function(){
                                  /* You may add your own implementation here */
                                  alert('you closed the popup without finishing the payment');
                                }
                              })
                            });

                            function submit_form(){
                              document.getElementById('checkout').submit();
                              
                            }
                          </script>
                        </div>
                      {{-- </form> --}}
                </div>
            </div>
        </div>


    </div>
@endsection

