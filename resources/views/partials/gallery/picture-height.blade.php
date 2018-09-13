@isset($item)

    <picture>

        <source type="image/webp" 
            srcset="
            {{ $item->image_height_thumb ? replaseExtension($item->image_height_thumb, 'webp') . ' 360w,' : '' }}
            {{ $item->image_height_small ? replaseExtension($item->image_height_small, 'webp') . ' 640w,' : '' }}
            {{ $item->image_height_medium ? replaseExtension($item->image_height_medium, 'webp') . ' 900w,' : '' }}
            {{ $item->image_height_large ? replaseExtension($item->image_height_large, 'webp') . ' 1080w,' : '' }}
            {{ $item->image_height ? replaseExtension($item->image_height, 'webp') . ' 1600w,' : '' }}
            "
        >

        <img src="{{ $item->image_height_mini }}" class="{{ $class ?? '' }}" alt="{{ $alt ?? $item->title ?? '' }}" 
            data-normal="{{ $item->image_height_large }}" 
            data-retina="{{ $item->image_height }}" 
            data-srcset=" 
            {{ $item->image_height_thumb }} 360w,
            {{ $item->image_height_small }} 640w,
            {{ $item->image_height_medium }} 900w,
            {{ $item->image_height_large }} 1080w,
            {{ $item->image_height }} 1600w,
            "
        >

    </picture>

@endisset