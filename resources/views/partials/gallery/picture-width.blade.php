@isset($item)

    <picture>

        <source type="image/webp" 
            srcset="
            {{ $item->image_thumb ? replaseExtension($item->image_thumb, 'webp') . ' 640w,' : '' }}
            {{ $item->image_small ? replaseExtension($item->image_small, 'webp') . ' 1136w,' : '' }}
            {{ $item->image_medium ? replaseExtension($item->image_medium, 'webp') . ' 1600w,' : '' }}
            {{ $item->image_large ? replaseExtension($item->image_large, 'webp') . ' 1920w,' : '' }}
            {{ $item->image ? replaseExtension($item->image, 'webp') . ' 2560w,' : '' }}
            "
        >

        <img src="{{ $item->image_mini }}" class="{{ $class ?? '' }}" alt="{{ $alt ?? $item->title ?? '' }}" 
            data-normal="{{ $item->image_large }}" 
            data-retina="{{ $item->image }}" 
            data-srcset="
            {{ $item->image_thumb }} 640w
            {{ $item->image_small }} 1136w,
            {{ $item->image_medium }} 1600w,
            {{ $item->image_large }} 1920w,
            {{ $item->image }} 2560w,
            "
        >

    </picture>

@endisset