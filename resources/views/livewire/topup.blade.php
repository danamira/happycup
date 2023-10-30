<div id="topup">
    @if(!$done)
        <img src="/assets/coins.png" alt="">
        <h3>Top up your credit</h3>
        <p>Your credit is currently insufficient to borrow a cup. You can top up your credit here in this page.</p>    
        <p>Please note that your credit will be returned to your account upon the return of the cup you borrow.</p>
        <p style="margin-top:20px !important;color:#000 !important">Current credit: {{$user->credit}} €</p>
        <div class="input_container">
            <input type="number" placeholder="5" wire:model="topupValue">
            <span>€</span>
        </div>
        <button wire:click="increment">Top Up</button>
    @else
        <img src="/assets/check.png" style="margin-top:40px" alt="">
        <h3 style="margin-bottom:10px !important">Successful!</h3>
        <p>Thank you for topping up your credit. Your credit has now increased by {{$topupValue}}€ to {{$user->credit}}€.</p>


    
    @endif
</div>
