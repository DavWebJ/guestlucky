<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-square btn-hero-success','data-toggle'=> 'click-ripple']) }}>                                       
    {{ $slot }}
</button>
