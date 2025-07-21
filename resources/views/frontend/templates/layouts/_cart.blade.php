@if(config('app.ecommerce_view_show'))
@php
    if (auth()->check()) {
        $userId = auth()->id();
        $totalCart = Modules\Ecommerce\Entities\Cart::where('user_id', $userId)->count();
    } else {
        $sessionId = session()->get('session_id');
        $totalCart = Modules\Ecommerce\Entities\Cart::where('session_id', $sessionId)->count();
    }
@endphp
<a href="{{ route('cart.cart') }}">
    <div class="alzatheme-header-cart">
        <span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd"
                    d="M18.1906 6.00295L15.6009 2.55004C15.3524 2.21867 14.8823 2.15152 14.5509 2.40004C14.2196 2.64857 14.1524 3.11867 14.4009 3.45004L16.3134 6H7.68847L9.60093 3.45004C9.84946 3.11867 9.7823 2.64857 9.45093 2.40004C9.11956 2.15152 8.64946 2.21867 8.40093 2.55004L5.81125 6.00295C3.91268 6.07556 2.40486 7.481 2.07031 9.25H21.9315C21.5969 7.48103 20.0891 6.07561 18.1906 6.00295ZM20.2829 18.808C19.903 20.6666 18.2815 22 16.4011 22H7.60066C5.7203 22 4.09876 20.6666 3.71893 18.808L2.08401 10.808C2.08006 10.7887 2.07625 10.7693 2.07258 10.75H21.9292C21.9255 10.7693 21.9217 10.7887 21.9178 10.808L20.2829 18.808ZM9.00073 13.25C9.41495 13.25 9.75073 13.5858 9.75073 14L9.75073 18C9.75073 18.4142 9.41495 18.75 9.00073 18.75C8.58652 18.75 8.25073 18.4142 8.25073 18L8.25073 14C8.25073 13.5858 8.58652 13.25 9.00073 13.25ZM15.7507 14C15.7507 13.5858 15.4149 13.25 15.0007 13.25C14.5865 13.25 14.2507 13.5858 14.2507 14V18C14.2507 18.4142 14.5865 18.75 15.0007 18.75C15.4149 18.75 15.7507 18.4142 15.7507 18V14Z"
                    fill="{{ $iconColor ?? '#0A165E' }}"/>
            </svg>
        </span>
        <span class="cart_number cart-count">{{ $totalCart }}</span>
    </div>
</a>
@endif
