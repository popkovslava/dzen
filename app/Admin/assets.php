<?php

/**
 * @var KodiCMS\Assets\Contracts\MetaInterface $meta
 * @var KodiCMS\Assets\Contracts\PackageManagerInterface $packages
 *
 * @see http://sleepingowladmin.ru/docs/assets
 */

// Meta::addJs('custom', asset('customjs/jquery.form.min.js'),'admin-default');

// PackageManager::add('stopRefresh')
//     ->js('tree', asset('customjs/stopPageRefresh.js'), ['admin-default'], true)
//     ->css('tree', asset('customcss/stopPageRefresh.css'), ['admin-default']);

PackageManager::add('cropper')
    ->js(
        'cropperjs',
        asset('packages/sleepingowl/custom/cropper/js/cropper.js'),
        ['admin-default'],
        true
    )
    ->css('croppercss', asset('packages/sleepingowl/custom/cropper/css/cropper.css'), ['admin-default']);

PackageManager::add('vue-cropimage')
    ->js(
        'vue-cropimage',
        asset('packages/sleepingowl/custom/js/admin/form/cropimage.js'),
        ['admin-default', 'cropper'],
        true
    );
