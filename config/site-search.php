<?php

return [
    /**
     * When crawling your site, we will ignore content that is on these URLs.
     *
     * All links on these URLs will still be followed and crawled.
     *
     * You may use `*` as a wildcard.
     */
    'ignore_content_on_urls' => [
        '',
        '/',
        '/media/*',
        '/hladat/*',
        '/clanky',
        '/clanky-z-roku/*',
        '/clanky-podla-autora/*',
        '/clanky-v-kategorii/*',
        '/clanky-podla-klucoveho-slova/*',
    ],

    /***
     * When indexing your site, we will ignore any content to the search index
     * that is selected by these CSS selectors.
     *
     * All links inside such content will still be crawled, so it's safe
     * it's safe to add a selector for your menu structure.
     */
    'ignore_content_by_css_selector' => [
        '[data-no-index]',
        'nav',
        'menu',
        '.header_menu_section',
        '.ch_banner_wrapper',
        'script',
        'aside',
        'footer',
        '.modal',
        '.preloader',
        '.source',
    ],

    /**
     * When crawling your site, we will not add any content to the search index
     * for responses that have any of these headers.
     */
    'do_not_index_content_headers' => [
        'site-search-do-not-index',
    ],

    /**
     * When crawling your site, we will not follow any of these links.
     *
     * You may use `*` as a wildcard.
     */
    'do_not_crawl_urls' => [
        '/login',
        '/register',
    ],

    /**
     * A search profile is a class that is responsible for determining which
     * pages should be crawled, whether they should be indexed, and which
     * indexer should be used.
     *
     * This profile will be used when none is specified in the `profile_class` attribute
     * of a `SiteSearchIndex` model.
     */
    // 'default_profile' => Spatie\SiteSearch\Profiles\DefaultSearchProfile::class,
    'default_profile' => App\Crawler\CustomSearchProfile::class,

    /**
     * An indexer is a class that is responsible for converting the content of a page
     * to a structure that will be added to the search index.
     *
     * This indexer will be used when none is specified in the `profile_class` attribute
     * of a `SiteSearchIndex` model.
     */
    'default_indexer' => Spatie\SiteSearch\Indexers\DefaultIndexer::class,

    /**
     * A driver is responsible for writing all scraped content
     * to a search index.
     */
    'default_driver' =>  Spatie\SiteSearch\Drivers\MeiliSearchDriver::class,
];
