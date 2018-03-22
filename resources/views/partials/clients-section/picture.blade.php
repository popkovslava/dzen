@isset($item)

    <picture>

        <source type="image/webp" 
            srcset="
            {{ $item->image ? replaseExtension($item->image, 'webp') . ' 250w,' : '' }}
            {{ $item->image_thumb ? replaseExtension($item->image_thumb, 'webp') . ' 150w,' : '' }}
            "
        >

        <img src="{{ $item->image_mini }}" class="{{ $class ?? '' }}" alt="{{ $alt ?? $item->name ?? '' }}" 
            data-normal="{{ $item->image_thumb }}" 
            data-retina="{{ $item->image }}" 
            data-srcset="
            {{ $item->image }} 250w,
            {{ $item->image_thumb }} 150w
            "
        >

    </picture>

@endisset