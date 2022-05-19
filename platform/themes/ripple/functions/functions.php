<?php

register_page_template([
    'no-sidebar' => __('No sidebar'),
]);

register_sidebar([
    'id'          => 'top_sidebar',
    'name'        => __('Top sidebar'),
    'description' => __('Area for widgets on the top sidebar'),
]);

register_sidebar([
    'id'          => 'footer_sidebar',
    'name'        => __('Footer sidebar'),
    'description' => __('Area for footer widgets'),
]);

add_shortcode('google-map', __('Google map'), __('Custom map'), function ($shortCode) {
    return Theme::partial('short-codes.google-map', ['address' => $shortCode->content]);
});

shortcode()->setAdminConfig('google-map', Theme::partial('short-codes.google-map-admin-config'));

add_shortcode('youtube-video', __('Youtube video'), __('Add youtube video'), function ($shortCode) {
    return Theme::partial('short-codes.youtube-video', ['url' => $shortCode->content]);
});

shortcode()->setAdminConfig('youtube-video', Theme::partial('short-codes.youtube-video-admin-config'));

add_shortcode('featured-posts', __('Featured posts'), __('Featured posts'), function () {
    return Theme::partial('short-codes.featured-posts');
});

add_shortcode('recent-posts', __('Recent posts'), __('Recent posts'), function ($shortCode) {
    return Theme::partial('short-codes.recent-posts', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('recent-posts', Theme::partial('short-codes.recent-posts-admin-config'));

add_shortcode('featured-categories-posts', __('Featured categories posts'), __('Featured categories posts'),
    function ($shortCode) {
        return Theme::partial('short-codes.featured-categories-posts', ['title' => $shortCode->title]);
    });

shortcode()->setAdminConfig('featured-categories-posts',
    Theme::partial('short-codes.featured-categories-posts-admin-config'));

add_shortcode('all-galleries', __('All Galleries'), __('All Galleries'), function ($shortCode) {
    return Theme::partial('short-codes.all-galleries', ['limit' => $shortCode->limit]);
});

shortcode()->setAdminConfig('all-galleries', Theme::partial('short-codes.all-galleries-admin-config'));

add_shortcode('main-slider', __('Main Slider'), __('Main Slider'), function($shortCode){
    return Theme::partial('short-codes.main-slider', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('main-slider', Theme::partial('short-codes.main-slider-admin-config'));

add_shortcode('pressrelease', __('pressrelease'), __('pressrelease'), function($shortCode){
    return Theme::partial('short-codes.pressrelease');
});

shortcode()->setAdminConfig('pressrelease', Theme::partial('short-codes.pressrelease-admin-config'));

add_shortcode('slick-carousel', __('slick-carousel'), __('slick-carousel'), function($shortCode){
    return Theme::partial('short-codes.slick-carousel');
});

shortcode()->setAdminConfig('slick-carousel', Theme::partial('short-codes.slick-carousel-admin-config'));

add_shortcode('banner-slider', __('Banner Slider'), __('Banner Slider'), function($shortCode){
    return Theme::partial('short-codes.banner-slider', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('banner-slider', Theme::partial('short-codes.banner-slider-admin-config'));

add_shortcode('css-for-post', __('Css For Post'), __('Css For Post'), function($shortCode){
    return Theme::partial('short-codes.css-for-post', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('banner-slider', Theme::partial('short-codes.css-for-post-admin-config'));

add_shortcode('notice-posts', __('Notice Posts'), __('Notice Posts'), function($shortCode){
    return Theme::partial('short-codes.notice-posts', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('notice-posts', Theme::partial('short-codes.notice-posts-admin-config'));

add_shortcode('company-content', __('Company Content'), __('Company Content'), function($shortCode){
    return Theme::partial('short-codes.company-content', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('company-content', Theme::partial('short-codes.company-content-admin-config'));

add_shortcode('original-product', __('Original Product'), __('Original Product'), function($shortCode){
    return Theme::partial('short-codes.original-product', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('original-product', Theme::partial('short-codes.original-product-admin-config'));

add_shortcode('notice-page-posts', __('Page Posts'), __('Page Posts'), function($shortCode){
    return Theme::partial('short-codes.notice-page-posts', ['title' => $shortCode->title]);
});

shortcode()->setAdminConfig('notice-page-posts', Theme::partial('short-codes.notice-page-posts-admin-config'));

add_shortcode('a-h4-tag', __('A H4 Tag'), __('A H4 Tag'), function($shortCode){
    return Theme::partial('short-codes.a-h4-tag', ['id'=>$shortCode->id, 'text'=>$shortCode->text]);
});

shortcode()->setAdminConfig('a-h4-tag', Theme::partial('short-codes.a-h4-tag-admin-config'));

add_shortcode('section', __('Section'), __('Section'), function($shortCode){
    return Theme::partial('short-codes.section', ['class' => $shortCode->class, 'id' => $shortCode->id, 'style' => $shortCode->style, 'content' => $shortCode->content]);
});

shortcode()->setAdminConfig('section', Theme::partial('short-codes.section-admin-config'));

add_shortcode('section-tag', __('Section Tag'), __('Section Tag'), function($shortCode){
    return Theme::partial('short-codes.section-tag', ['title' => $shortCode->title, 'id' => $shortCode->id, 'style' => $shortCode->style]);
});

shortcode()->setAdminConfig('section-tag', Theme::partial('short-codes.section-tag-admin-config'));

add_shortcode('section-tag-close', __('Section Tag Close'), __('Section Tag Close'), function($shortCode){
    return Theme::partial('short-codes.section-tag-close');
});

shortcode()->setAdminConfig('section-tag-close', Theme::partial('short-codes.section-tag-close-admin-config'));

add_shortcode('span-color', __('Span Color'), __('Span Color'), function($shortCode){
    return Theme::partial('short-codes.span-color', ['color' => $shortCode->color]);
});

shortcode()->setAdminConfig('span-color', Theme::partial('short-codes.span-color-admin-config'));

add_shortcode('iframe', __('Iframe'), __('Iframe'), function($shortCode){
    return Theme::partial('short-codes.iframe', ['src' => $shortCode->src, 'width' => $shortCode->width, 'height' => $shortCode->height,]);
});

shortcode()->setAdminConfig('iframe', Theme::partial('short-codes.iframe-admin-config'));

add_shortcode('a-tag-with-target', __('A Tag With Target'), __('A Tag With Target'), function($shortCode){
    return Theme::partial('short-codes.a-tag-with-target', ['link' => $shortCode->link, 'target' => $shortCode->target, 'text' => $shortCode->text,]);
});

shortcode()->setAdminConfig('a-tag-with-target', Theme::partial('short-codes.a-tag-with-target-admin-config'));

theme_option()
    ->setField([
        'id'         => 'primary_font',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'googleFonts',
        'label'      => __('Primary font'),
        'attributes' => [
            'name'  => 'primary_font',
            'value' => 'Roboto',
        ],
    ])
    ->setField([
        'id'         => 'primary_color',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'customColor',
        'label'      => __('Primary color'),
        'attributes' => [
            'name'  => 'primary_color',
            'value' => '#ff2b4a',
        ],
    ])
    ->setField([
        'id'         => 'site_description',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'textarea',
        'label'      => __('Site description'),
        'attributes' => [
            'name'    => 'site_description',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'address',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Address'),
        'attributes' => [
            'name'    => 'address',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'website',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'url',
        'label'      => __('Website'),
        'attributes' => [
            'name'    => 'website',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 255,
            ],
        ],
    ])
    ->setField([
        'id'         => 'contact_email',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'email',
        'label'      => __('Email'),
        'attributes' => [
            'name'    => 'contact_email',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'data-counter' => 120,
            ],
        ],
    ])
    ->setSection([
        'title'      => __('Social'),
        'desc'       => __('Social links'),
        'id'         => 'opt-text-subsection-social',
        'subsection' => true,
        'icon'       => 'fa fa-share-alt',
    ])
    ->setField([
        'id'         => 'facebook',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Facebook',
        'attributes' => [
            'name'    => 'facebook',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://facebook.com/@username',
            ],
        ],
    ])
    ->setField([
        'id'         => 'twitter',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Twitter',
        'attributes' => [
            'name'    => 'twitter',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://twitter.com/@username',
            ],
        ],
    ])
    ->setField([
        'id'         => 'youtube',
        'section_id' => 'opt-text-subsection-social',
        'type'       => 'text',
        'label'      => 'Youtube',
        'attributes' => [
            'name'    => 'youtube',
            'value'   => null,
            'options' => [
                'class'       => 'form-control',
                'placeholder' => 'https://youtube.com/@channel-url',
            ],
        ],
    ])
    ->setField([
        'id'         => 'copyright',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Copyright'),
        'attributes' => [
            'name'    => 'copyright',
            'value'   => null,
            'options' => [
                'class'        => 'form-control',
                'placeholder'  => __('Change copyright'),
                'data-counter' => 255,
            ],
        ],
        'helper'     => __('Copyright on footer of site'),
    ])
    ->setField([
        'id'         => 'facebook_chat_enabled',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'select',
        'label'      => __('Enable Facebook chat?'),
        'attributes' => [
            'name'    => 'facebook_chat_enabled',
            'list'    => [
                'yes' => trans('core/base::base.yes'),
                'no'  => trans('core/base::base.no'),
            ],
            'value'   => 'yes',
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'facebook_page_id',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'text',
        'label'      => __('Facebook page ID'),
        'attributes' => [
            'name'    => 'facebook_page_id',
            'value'   => null,
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ])
    ->setField([
        'id'         => 'facebook_comment_enabled_in_post',
        'section_id' => 'opt-text-subsection-general',
        'type'       => 'select',
        'label'      => __('Enable Facebook comment in post detail page?'),
        'attributes' => [
            'name'    => 'facebook_comment_enabled_in_post',
            'list'    => [
                'yes' => trans('core/base::base.yes'),
                'no'  => trans('core/base::base.no'),
            ],
            'value'   => 'yes',
            'options' => [
                'class' => 'form-control',
            ],
        ],
    ]);

add_action('init', function () {
    config([
        'filesystems.disks.public.root' => public_path('storage'),
        'filesystems.disks.public.url'  => str_replace('/index.php', '', url('storage')),
    ]);
}, 124);

RvMedia::addSize('featured', 565, 375)->addSize('medium', 540, 360);
