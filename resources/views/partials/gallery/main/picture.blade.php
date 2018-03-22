@isset($item)

    <picture>
        <source media="(orientation: portrait)" type="image/webp" 
            sizes="
            {{ $item->image_height_thumb ? '((max-width: 360px) ' . 'or' . ' (max-width: 18em)) 360px,' : '' }}
            {{ $item->image_height_small ? '((max-width: 640px) ' . 'or' . ' (max-width: 32em)) 640px,' : '' }}
            {{ $item->image_height_medium ? '((max-width: 900px) ' . 'or' . ' (max-width: 45em)) 900px,' : '' }}
            {{ $item->image_height_large ? '((max-width: 1080px) ' . 'or' . ' (max-width: 54em)) 1080px,' : '' }}
            {{ $item->image_height ? '((min-width: 1081px) ' . 'or' . ' (min-width: 54.1em)) 1600px' : '' }}
            " 
            srcset="
            {{ $item->image_height_thumb ? replaseExtension($item->image_height_thumb, 'webp') . ' 360w,' : '' }}
            {{ $item->image_height_small ? replaseExtension($item->image_height_small, 'webp') . ' 640w,' : '' }}
            {{ $item->image_height_medium ? replaseExtension($item->image_height_medium, 'webp') . ' 900w,' : '' }}
            {{ $item->image_height_large ? replaseExtension($item->image_height_large, 'webp') . ' 1080w,' : '' }}
            {{ $item->image_height ? replaseExtension($item->image_height, 'webp') . ' 1600w,' : '' }}
            "
        >
        <source media="(orientation: landscape)" type="image/webp" 
            sizes="
            {{ $item->image_thumb ? '((max-width: 640px) ' . 'or' . ' (max-width: 32em)) 640px,' : '' }}
            {{ $item->image_small ? '((max-width: 1136px) ' . 'or' . ' (max-width: 56.8em)) 1136px,' : '' }}
            {{ $item->image_medium ? '((max-width: 1600px) ' . 'or' . ' (max-width: 80em)) 1600px,' : '' }}
            {{ $item->image_large ? '((max-width: 1920px) ' . 'or' . ' (max-width: 96em)) 1920px,' : '' }}
            {{ $item->image ? '((min-width: 1921px) ' . 'or' . ' (min-width: 96.1em)) 2560px' : '' }}
            " 
            srcset="
            {{ $item->image_thumb ? replaseExtension($item->image_thumb, 'webp') . ' 640w,' : '' }}
            {{ $item->image_small ? replaseExtension($item->image_small, 'webp') . ' 1136w,' : '' }}
            {{ $item->image_medium ? replaseExtension($item->image_medium, 'webp') . ' 1600w,' : '' }}
            {{ $item->image_large ? replaseExtension($item->image_large, 'webp') . ' 1920w,' : '' }}
            {{ $item->image ? replaseExtension($item->image, 'webp') . ' 2560w,' : '' }}
            "
        >
        <source media="(orientation: portrait)" 
            sizes="
            {{ $item->image_height_thumb ? '((max-width: 360px) ' . 'or' . ' (max-width: 18em)) 360px,' : '' }}
            {{ $item->image_height_small ? '((max-width: 640px) ' . 'or' . ' (max-width: 32em)) 640px,' : '' }}
            {{ $item->image_height_medium ? '((max-width: 900px) ' . 'or' . ' (max-width: 45em)) 900px,' : '' }}
            {{ $item->image_height_large ? '((max-width: 1080px) ' . 'or' . ' (max-width: 54em)) 1080px,' : '' }}
            {{ $item->image_height ? '((min-width: 1081px) ' . 'or' . ' (min-width: 54.1em)) 1600px' : '' }}
            " 
            srcset="
            {{ $item->image_height_thumb ? $item->image_height_thumb . ' 360w,' : '' }}
            {{ $item->image_height_small ? $item->image_height_small . ' 640w,' : '' }}
            {{ $item->image_height_medium ? $item->image_height_medium . ' 900w,' : '' }}
            {{ $item->image_height_large ? $item->image_height_large . ' 1080w,' : '' }}
            {{ $item->image_height ? $item->image_height . ' 1600w,' : '' }}
            "
        >
        <source media="(orientation: landscape)" 
            sizes="
            {{ $item->image_thumb ? '((max-width: 640px) ' . 'or' . ' (max-width: 32em)) 640px,' : '' }}
            {{ $item->image_small ? '((max-width: 1136px) ' . 'or' . ' (max-width: 56.8em)) 1136px,' : '' }}
            {{ $item->image_medium ? '((max-width: 1600px) ' . 'or' . ' (max-width: 80em)) 1600px,' : '' }}
            {{ $item->image_large ? '((max-width: 1920px) ' . 'or' . ' (max-width: 96em)) 1920px,' : '' }}
            {{ $item->image ? '((min-width: 1921px) ' . 'or' . ' (min-width: 96.1em)) 2560px' : '' }}
            " 
            srcset="
            {{ $item->image_thumb ? $item->image_thumb . ' 640w,' : '' }}
            {{ $item->image_small ? $item->image_small . ' 1136w,' : '' }}
            {{ $item->image_medium ? $item->image_medium . ' 1600w,' : '' }}
            {{ $item->image_large ? $item->image_large . ' 1920w,' : '' }}
            {{ $item->image ? $item->image . ' 2560w,' : '' }}
            "
        >

        <img src="{{ $item->image_mini }}" class="{{ $class ?? '' }}" alt="{{ $alt ?? '' }}" 
            data-normal="{{ $item->image_large ?? $item->image_medium ?? $item->image_small }}" 
            data-retina="{{ $item->image }}" 
            data-srcset="{{ $item->image_mini ? $item->image_mini . ' 50w,' : '' }}"
        >

    </picture>

@endisset