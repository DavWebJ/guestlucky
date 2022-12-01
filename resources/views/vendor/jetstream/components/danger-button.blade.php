<button {{ $attributes->merge(['type' => 'button', 'class' => 'btn-hero-danger','data-toggle'=> 'click-ripple']) }}>
    <i class="fa fa-fw fa-times mr-1"></i>                                     
    {{ $slot }}
</button>
