<?php

return
    function ($page, $site) {
        return [
            'title' => $page->isHomePage()
                ? $site->title()
                : $page->title() . ' | ' . $site->title(),
            'meta' => [
                'description' => $site->metadescription()
            ],
            'link' => [
                'canonical' => $page->url()
            ],
            'og' => [
                'title' => $page->isHomePage()
                    ? $site->title()
                    : $page->title() . ' | ' . $site->title(),
                'site_name' => $site->title(),
                'description' => $site->metadescription(),
                'type' => 'website',
                'url' => $page->url(),
                'image' => url('assets/images/og-site.jpg'),
                'image:type' => 'image/jpeg',
                'locale' => 'fr_FR'
            ]
        ];
    };
