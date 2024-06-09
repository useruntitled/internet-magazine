@props([
    "width",
])

@php
    if ($width == "full") {
        $widthStyle = "width: 100%; left: 0px; right: 0px";
    } else {
        $widthStyle = "width: " . $width . "px";
    }
@endphp

<div x-data="{ show: false }">
    <button
        class="bg-gray-800 px-4 py-2 rounded-xl text-white"
        @click="show = ! show"
    >
        <div
            x-show="show"
            @click.outside="show = false"
            class="absolute z-40 mt-8 text-start bg-white shadow rounded-lg p-5 text-black cursor-default"
            style="{{ $widthStyle }}"
        >
            {{ $content }}
        </div>
        {{ $trigger }}
    </button>
</div>
