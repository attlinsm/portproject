<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-info w-100 waves-effect waves-light']) }}>
    {{ $slot }}
</button>
