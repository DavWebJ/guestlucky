<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-square btn-hero-primary','data-toggle'=> 'click-ripple']) }}>                                       
    {{ $slot }}
</button>
