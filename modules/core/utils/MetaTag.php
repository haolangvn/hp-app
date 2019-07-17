<?php

namespace hp\utils;

use hp\utils\UShort;

/**
 * Description of MetaTag
 *
 * @author HAO
 */
class MetaTag {

    /**
     * @var string
     * @since 1.0.8
     */
    const LINK_CANONICAL = 'linkCanonical';

    /**
     * @var string og:type key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_OG_TYPE = 'ogType';

    /**
     * @var string twitter:card key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_TWITTER_CARD = 'twitterCard';

    /**
     * @var string og:title key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_OG_TITLE = 'ogTitle';

    /**
     * @var string twitter:title key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_TWITTER_TITLE = 'twitterTitle';

    /**
     * @var string og:url key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_OG_URL = 'ogUrl';

    /**
     * @var string twitter:url key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_TWITTER_URL = 'twitterUrl';

    /**
     * @var string description meta key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_DESCRIPTION = 'metaDescription';

    /**
     * @var string og:description key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_OG_DESCRIPTION = 'ogDescription';

    /**
     * @var string twitter:description key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_TWITTER_DESCRIPTION = 'twitterDescription';

    /**
     * @var string keywords meta key which is used for meta registration. Use this constant in order to override the default implementation.
     * @since 1.0.8
     */
    const META_KEYWORDS = 'metaKeywords';

    /**
     * 
     * @param type $meta
     * @param type $view
     */
    public static function register($meta = [], $view = null) {

        if ($view === null) {
            $view = UShort::app()->getView();
        }
        if (isset($meta['title']) && $meta['title'] != '') {
            $view->title = $meta['title'];
        }

        $view->registerMetaTag(['name' => 'og:type', 'content' => 'website'], self::META_OG_TYPE);
        $view->registerMetaTag(['name' => 'twitter:card', 'content' => 'summary'], self::META_TWITTER_CARD);

        $view->registerMetaTag(['name' => 'og:title', 'content' => $view->title], self::META_OG_TITLE);
        $view->registerMetaTag(['name' => 'twitter:title', 'content' => $view->title], self::META_TWITTER_TITLE);

        $view->registerLinkTag(['rel' => 'canonical', 'href' => UShort::request()->absoluteUrl], self::LINK_CANONICAL);
        $view->registerMetaTag(['name' => 'og:url', 'content' => UShort::request()->absoluteUrl], self::META_OG_URL);
        $view->registerMetaTag(['name' => 'twitter:url', 'content' => UShort::request()->absoluteUrl], self::META_TWITTER_URL);

        if (isset($meta['description']) && $meta['description'] != '') {
            $view->registerMetaTag(['name' => 'description', 'content' => $meta['description']], self::META_DESCRIPTION);
            $view->registerMetaTag(['name' => 'og:description', 'content' => $meta['description']], self::META_OG_DESCRIPTION);
            $view->registerMetaTag(['name' => 'twitter:description', 'content' => $meta['description']], self::META_TWITTER_DESCRIPTION);
        }

        if (isset($meta['keywords']) && $meta['keywords'] != '') {
            $view->registerMetaTag(['name' => 'keywords', 'content' => is_array($meta['keywords']) ? implode(", ", $meta['keywords']) : $meta['keywords']], self::META_KEYWORDS);
        }
    }

}
