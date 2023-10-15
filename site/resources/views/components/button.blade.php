@props(["style" => ""])

<button {{ $attributes->class([])->merge(["type" => "button"]) }}>{{ $slot }}</button>
