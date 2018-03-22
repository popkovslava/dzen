@isset($item)

    <picture>

        <source type="image/webp" 
            srcset="
            {{ $item->image ? replaseExtension($item->image, 'webp') . ' 200w,' : '' }}
            {{ $item->image_mini ? replaseExtension($item->image_mini, 'webp') . ' 50w,' : '' }}
            "
        >

        <img src="{{ $item->image_mini ?? $item->image }}" class="{{ $class ?? '' }}" alt="{{ $alt ?? $item->title ?? '' }}" 
            data-normal="{{ $item->image }}" 
            sizes="200px, 50px"
            data-srcset="
            {{ $item->image ? $item->image . ' 200w,' : '' }}
            {{ $item->image_mini ? $item->image_mini . ' 50w' : '' }}
            "
        >

    </picture>

@endisset
