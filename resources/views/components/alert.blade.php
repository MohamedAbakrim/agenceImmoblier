<div {{ $attributes->merge(['class' => "alert alert-$type"]) }}>
    {{ $slot }}
</div>