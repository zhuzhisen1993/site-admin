
<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]>
<html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]>
<html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Your Store</title>
    <base href="http://opencart3.vm/"/>
    <meta name="description" content="My Store"/>


    <link href="catalog/view/theme/barifox/stylesheet/css/theme.scss.css?201809101423" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:400,700" rel="stylesheet" type="text/css" media="all">
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:600" rel="stylesheet" type="text/css" media="all">
    <link href="catalog/view/theme/barifox/stylesheet/css/style.css?201809101423" rel="stylesheet" type="text/css">
    <script src="catalog/view/theme/barifox/js/jquery-3.2.1.min.js?201809101423"></script>
    <script src="catalog/view/theme/barifox/js/lazysizes.js?201809101423" async="async"></script>
    <script src="catalog/view/theme/barifox/js/vendor.js?201809101423" defer="defer"></script>
    <script src="catalog/view/theme/barifox/js/theme.js?201809101423" defer="defer"></script>


    <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
    </script>

    <!-- Facebook Pixel Code -->
    <script>
        fbq('init', '123456');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=123456&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Facebook Pixel Code -->
    <script>
        fbq('init', '789');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=789&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->
    <!-- Facebook Pixel Code -->
    <script>
        fbq('init', '1011');
        fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
                   src="https://www.facebook.com/tr?id=1011&ev=PageView&noscript=1"
        /></noscript>
    <!-- End Facebook Pixel Code -->


    <script>
        var theme = {
            strings: {
                addToCart: "Add to cart",
                soldOut: "Sold out",
                unavailable: "Unavailable",
                showMore: "Show More",
                showLess: "Show Less",
                addressError: "Error looking up that address",
                addressNoResults: "No results for that address",
                addressQueryLimit: "You have exceeded the Google API usage limit. Consider upgrading to a \u003ca href=\"https:\/\/developers.google.com\/maps\/premium\/usage-limits\"\u003ePremium Plan\u003c\/a\u003e.",
                authError: "There was a problem authenticating your Google Maps account."
            },
            moneyFormat: "$"
        }
        document.documentElement.className = document.documentElement.className.replace('no-js', 'js');
    </script>
</head>
<body>

<div id="SearchDrawer" class="search-bar drawer drawer--top">
    <div class="search-bar__table">
        <div class="search-bar__table-cell search-bar__form-wrapper">
            <form class="search search-bar__form" action="/" method="get" role="search">
                <button class="search-bar__submit search__submit btn--link" type="submit">
                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 37 40">
                        <path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path>
                    </svg>
                    <span class="icon__fallback-text">Submit</span>
                </button>
                <input class="search__input search-bar__input" type="search" name="q" value="" placeholder="Search"
                       aria-label="Search">
            </form>
        </div>
        <div class="search-bar__table-cell text-right">
            <button type="button" class="btn--link search-bar__close js-drawer-close">
                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 37 40">
                    <path d="M21.3 23l11-11c.8-.8.8-2 0-2.8-.8-.8-2-.8-2.8 0l-11 11-11-11c-.8-.8-2-.8-2.8 0-.8.8-.8 2 0 2.8l11 11-11 11c-.8.8-.8 2 0 2.8.4.4.9.6 1.4.6s1-.2 1.4-.6l11-11 11 11c.4.4.9.6 1.4.6s1-.2 1.4-.6c.8-.8.8-2 0-2.8l-11-11z"></path>
                </svg>
                <span class="icon__fallback-text">Close search</span>
            </button>
        </div>
    </div>
</div>


<div id="shopify-section-header" class="shopify-section">
    <div data-section-id="header" data-section-type="header-section">
        <nav class="mobile-nav-wrapper medium-up--hide" role="navigation">
            <ul id="MobileNav" class="mobile-nav">

                <li class="mobile-nav__item border-bottom">

                    <a href="/" class="mobile-nav__link" aria-current="page">
                        HOME
                    </a>

                </li>

                <li class="mobile-nav__item border-bottom">
                    <button type="button" class="btn--link js-toggle-submenu mobile-nav__link" data-target="wigs-3" data-level="1">
                        Desktops
                        <div class="mobile-nav__icon">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98">
                                <defs>
                                    <style>.cls-1{fill:#231f20}</style>
                                </defs>
                                <path class="cls-1" d="M223.18 628.49a35 35 0 0 1-24.75-59.75L388.17 379 198.43 189.26a35 35 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L247.93 618.24a34.89 34.89 0 0 1-24.75 10.25z"
                                      transform="translate(-188.18 -129.51)"></path>
                            </svg>
                            <span class="icon__fallback-text">expand</span>
                        </div>
                    </button>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=20_26" class="mobile-nav__sublist-link">
                                PC (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=20_27" class="mobile-nav__sublist-link">
                                Mac (1)
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <button type="button" class="btn--link js-toggle-submenu mobile-nav__link" data-target="wigs-3" data-level="1">
                        Laptops &amp; Notebooks
                        <div class="mobile-nav__icon">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98">
                                <defs>
                                    <style>.cls-1{fill:#231f20}</style>
                                </defs>
                                <path class="cls-1" d="M223.18 628.49a35 35 0 0 1-24.75-59.75L388.17 379 198.43 189.26a35 35 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L247.93 618.24a34.89 34.89 0 0 1-24.75 10.25z"
                                      transform="translate(-188.18 -129.51)"></path>
                            </svg>
                            <span class="icon__fallback-text">expand</span>
                        </div>
                    </button>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=18_46" class="mobile-nav__sublist-link">
                                Macs (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=18_45" class="mobile-nav__sublist-link">
                                Windows (0)
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <button type="button" class="btn--link js-toggle-submenu mobile-nav__link" data-target="wigs-3" data-level="1">
                        Components
                        <div class="mobile-nav__icon">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98">
                                <defs>
                                    <style>.cls-1{fill:#231f20}</style>
                                </defs>
                                <path class="cls-1" d="M223.18 628.49a35 35 0 0 1-24.75-59.75L388.17 379 198.43 189.26a35 35 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L247.93 618.24a34.89 34.89 0 0 1-24.75 10.25z"
                                      transform="translate(-188.18 -129.51)"></path>
                            </svg>
                            <span class="icon__fallback-text">expand</span>
                        </div>
                    </button>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_29" class="mobile-nav__sublist-link">
                                Mice and Trackballs (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_28" class="mobile-nav__sublist-link">
                                Monitors (2)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_30" class="mobile-nav__sublist-link">
                                Printers (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_31" class="mobile-nav__sublist-link">
                                Scanners (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_32" class="mobile-nav__sublist-link">
                                Web Cameras (0)
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=57" class="mobile-nav__link" aria-current="page">
                        Tablets
                    </a>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=17" class="mobile-nav__link" aria-current="page">
                        Software
                    </a>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=24" class="mobile-nav__link" aria-current="page">
                        Phones &amp; PDAs
                    </a>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=33" class="mobile-nav__link" aria-current="page">
                        Cameras
                    </a>
                </li>
                <li class="mobile-nav__item border-bottom">
                    <button type="button" class="btn--link js-toggle-submenu mobile-nav__link" data-target="wigs-3" data-level="1">
                        MP3 Players
                        <div class="mobile-nav__icon">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-right" viewBox="0 0 284.49 498.98">
                                <defs>
                                    <style>.cls-1{fill:#231f20}</style>
                                </defs>
                                <path class="cls-1" d="M223.18 628.49a35 35 0 0 1-24.75-59.75L388.17 379 198.43 189.26a35 35 0 0 1 49.5-49.5l214.49 214.49a35 35 0 0 1 0 49.5L247.93 618.24a34.89 34.89 0 0 1-24.75 10.25z"
                                      transform="translate(-188.18 -129.51)"></path>
                            </svg>
                            <span class="icon__fallback-text">expand</span>
                        </div>
                    </button>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_43" class="mobile-nav__sublist-link">
                                test 11 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_44" class="mobile-nav__sublist-link">
                                test 12 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_47" class="mobile-nav__sublist-link">
                                test 15 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_48" class="mobile-nav__sublist-link">
                                test 16 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_49" class="mobile-nav__sublist-link">
                                test 17 (0)
                            </a>
                        </li>
                    </ul>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_50" class="mobile-nav__sublist-link">
                                test 18 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_51" class="mobile-nav__sublist-link">
                                test 19 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_52" class="mobile-nav__sublist-link">
                                test 20 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_53" class="mobile-nav__sublist-link">
                                test 21 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_54" class="mobile-nav__sublist-link">
                                test 22 (0)
                            </a>
                        </li>
                    </ul>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_55" class="mobile-nav__sublist-link">
                                test 23 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_56" class="mobile-nav__sublist-link">
                                test 24 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_38" class="mobile-nav__sublist-link">
                                test 4 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_37" class="mobile-nav__sublist-link">
                                test 5 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_39" class="mobile-nav__sublist-link">
                                test 6 (0)
                            </a>
                        </li>
                    </ul>
                    <ul class="mobile-nav__dropdown" data-parent="wigs-3" data-level="2">
                        <button class="btn--link js-toggle-submenu mobile-nav__return-btn" type="button">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-chevron-left" viewBox="0 0 284.49 498.98"><defs><style>.cls-1{fill:#231f20}</style></defs><path class="cls-1" d="M437.67 129.51a35 35 0 0 1 24.75 59.75L272.67 379l189.75 189.74a35 35 0 1 1-49.5 49.5L198.43 403.75a35 35 0 0 1 0-49.5l214.49-214.49a34.89 34.89 0 0 1 24.75-10.25z" transform="translate(-188.18 -129.51)"></path></svg>
                            <span class="icon__fallback-text">collapse</span>
                        </button>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_40" class="mobile-nav__sublist-link">
                                test 7 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_41" class="mobile-nav__sublist-link">
                                test 8 (0)
                            </a>
                        </li>
                        <li class="mobile-nav__item border-bottom">

                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_42" class="mobile-nav__sublist-link">
                                test 9 (0)
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>


        <div class="announcement-bar">
            <p class="announcement-bar__message">FREE SHIPPING on Odrers Over $29.95</p>
        </div>


        <header class="site-header border-bottom logo--left" role="banner">
            <div class="grid grid--no-gutters grid--table">


                <div class="grid__item small--one-half medium-up--one-quarter logo-align--left">


                    <h1 class="h2 site-header__logo" itemscope="" itemtype="http://schema.org/Organization">


                        <a href="/" itemprop="url" class="site-header__logo-image">
                            <img class="js lazyautosizes lazyloaded" src="http://opencart3.vm/image/catalog/2115233_540x.png">
                        </a>


                    </h1>

                </div>


                <nav class="grid__item medium-up--one-half small--hide" id="AccessibleNav" role="navigation">
                    <ul class="site-nav list--inline " id="SiteNav">

                        <li class="site-nav--active">
                            <a href="/" class="site-nav__link site-nav__link--main" aria-current="page">HOME</a>
                        </li>

                        <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true" aria-controls="SiteNavLabel-wigs">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=20" class="site-nav__link site-nav__link--main" aria-current="page"
                               aria-expanded="false">
                                Desktops
                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down"
                                     viewBox="0 0 498.98 284.49">
                                    <defs>
                                        <style>.cls-1{fill:#231f20}</style>
                                    </defs>
                                    <path class="cls-1" d="M80.93 271.76A35 35 0 0 1 140.68 247l189.74 189.75L520.16 247a35 35 0 1 1 49.5 49.5L355.17 511a35 35 0 0 1-49.5 0L91.18 296.5a34.89 34.89 0 0 1-10.25-24.74z"
                                          transform="translate(-80.93 -236.76)"></path>
                                </svg>
                            </a>
                            <div class="site-nav__dropdown" id="SiteNavLabel-wigs">
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=20_26" class="site-nav__link site-nav__child-link">
                                            PC (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=20_27" class="site-nav__link site-nav__child-link">
                                            Mac (1)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true" aria-controls="SiteNavLabel-wigs">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=18" class="site-nav__link site-nav__link--main" aria-current="page"
                               aria-expanded="false">
                                Laptops &amp; Notebooks
                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down"
                                     viewBox="0 0 498.98 284.49">
                                    <defs>
                                        <style>.cls-1{fill:#231f20}</style>
                                    </defs>
                                    <path class="cls-1" d="M80.93 271.76A35 35 0 0 1 140.68 247l189.74 189.75L520.16 247a35 35 0 1 1 49.5 49.5L355.17 511a35 35 0 0 1-49.5 0L91.18 296.5a34.89 34.89 0 0 1-10.25-24.74z"
                                          transform="translate(-80.93 -236.76)"></path>
                                </svg>
                            </a>
                            <div class="site-nav__dropdown" id="SiteNavLabel-wigs">
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=18_46" class="site-nav__link site-nav__child-link">
                                            Macs (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=18_45" class="site-nav__link site-nav__child-link">
                                            Windows (0)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true" aria-controls="SiteNavLabel-wigs">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25" class="site-nav__link site-nav__link--main" aria-current="page"
                               aria-expanded="false">
                                Components
                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down"
                                     viewBox="0 0 498.98 284.49">
                                    <defs>
                                        <style>.cls-1{fill:#231f20}</style>
                                    </defs>
                                    <path class="cls-1" d="M80.93 271.76A35 35 0 0 1 140.68 247l189.74 189.75L520.16 247a35 35 0 1 1 49.5 49.5L355.17 511a35 35 0 0 1-49.5 0L91.18 296.5a34.89 34.89 0 0 1-10.25-24.74z"
                                          transform="translate(-80.93 -236.76)"></path>
                                </svg>
                            </a>
                            <div class="site-nav__dropdown" id="SiteNavLabel-wigs">
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_29" class="site-nav__link site-nav__child-link">
                                            Mice and Trackballs (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_28" class="site-nav__link site-nav__child-link">
                                            Monitors (2)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_30" class="site-nav__link site-nav__child-link">
                                            Printers (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_31" class="site-nav__link site-nav__child-link">
                                            Scanners (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=25_32" class="site-nav__link site-nav__child-link">
                                            Web Cameras (0)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="site-nav--active">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=57" class="site-nav__link site-nav__link--main" aria-current="page">Tablets</a>
                        </li>
                        </li>
                        <li class="site-nav--active">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=17" class="site-nav__link site-nav__link--main" aria-current="page">Software</a>
                        </li>
                        </li>
                        <li class="site-nav--active">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=24" class="site-nav__link site-nav__link--main" aria-current="page">Phones &amp; PDAs</a>
                        </li>
                        </li>
                        <li class="site-nav--active">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=33" class="site-nav__link site-nav__link--main" aria-current="page">Cameras</a>
                        </li>
                        </li>
                        <li class="site-nav--has-dropdown site-nav--active" aria-haspopup="true" aria-controls="SiteNavLabel-wigs">
                            <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34" class="site-nav__link site-nav__link--main" aria-current="page"
                               aria-expanded="false">
                                MP3 Players
                                <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon--wide icon-chevron-down"
                                     viewBox="0 0 498.98 284.49">
                                    <defs>
                                        <style>.cls-1{fill:#231f20}</style>
                                    </defs>
                                    <path class="cls-1" d="M80.93 271.76A35 35 0 0 1 140.68 247l189.74 189.75L520.16 247a35 35 0 1 1 49.5 49.5L355.17 511a35 35 0 0 1-49.5 0L91.18 296.5a34.89 34.89 0 0 1-10.25-24.74z"
                                          transform="translate(-80.93 -236.76)"></path>
                                </svg>
                            </a>
                            <div class="site-nav__dropdown" id="SiteNavLabel-wigs">
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_43" class="site-nav__link site-nav__child-link">
                                            test 11 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_44" class="site-nav__link site-nav__child-link">
                                            test 12 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_47" class="site-nav__link site-nav__child-link">
                                            test 15 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_48" class="site-nav__link site-nav__child-link">
                                            test 16 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_49" class="site-nav__link site-nav__child-link">
                                            test 17 (0)
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_50" class="site-nav__link site-nav__child-link">
                                            test 18 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_51" class="site-nav__link site-nav__child-link">
                                            test 19 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_52" class="site-nav__link site-nav__child-link">
                                            test 20 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_53" class="site-nav__link site-nav__child-link">
                                            test 21 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_54" class="site-nav__link site-nav__child-link">
                                            test 22 (0)
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_55" class="site-nav__link site-nav__child-link">
                                            test 23 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_56" class="site-nav__link site-nav__child-link">
                                            test 24 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_38" class="site-nav__link site-nav__child-link">
                                            test 4 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_37" class="site-nav__link site-nav__child-link">
                                            test 5 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_39" class="site-nav__link site-nav__child-link">
                                            test 6 (0)
                                        </a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_40" class="site-nav__link site-nav__child-link">
                                            test 7 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_41" class="site-nav__link site-nav__child-link">
                                            test 8 (0)
                                        </a>
                                    </li>
                                    <li>
                                        <a href="http://opencart3.vm/index.php?route=product/category&amp;language=en-gb&amp;path=34_42" class="site-nav__link site-nav__child-link">
                                            test 9 (0)
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    </ul>

                </nav>


                <div class="grid__item small--one-half medium-up--one-quarter text-right site-header__icons site-header__icons--plus">
                    <div class="site-header__icons-wrapper">

                        <div class="site-header__search small--hide">
                            <form action="/" method="get" class="search-header search" role="search">
                                <input class="search-header__input search__input" type="search" name="q" placeholder="Search"
                                       aria-label="Search">
                                <button class="search-header__submit search__submit btn--link" type="submit">
                                    <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 37 40">
                                        <path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path>
                                    </svg>
                                    <span class="icon__fallback-text">Submit</span>
                                </button>
                            </form>

                        </div>


                        <button type="button" class="btn--link site-header__search-toggle js-drawer-open-top medium-up--hide"
                                aria-controls="SearchDrawer" aria-expanded="false">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-search" viewBox="0 0 37 40">
                                <path d="M35.6 36l-9.8-9.8c4.1-5.4 3.6-13.2-1.3-18.1-5.4-5.4-14.2-5.4-19.7 0-5.4 5.4-5.4 14.2 0 19.7 2.6 2.6 6.1 4.1 9.8 4.1 3 0 5.9-1 8.3-2.8l9.8 9.8c.4.4.9.6 1.4.6s1-.2 1.4-.6c.9-.9.9-2.1.1-2.9zm-20.9-8.2c-2.6 0-5.1-1-7-2.9-3.9-3.9-3.9-10.1 0-14C9.6 9 12.2 8 14.7 8s5.1 1 7 2.9c3.9 3.9 3.9 10.1 0 14-1.9 1.9-4.4 2.9-7 2.9z"></path>
                            </svg>
                            <span class="icon__fallback-text">Search</span>
                        </button>



                        <a href="/" class="site-header__account">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-login" viewBox="0 0 28.33 37.68">
                                <path d="M14.17 14.9a7.45 7.45 0 1 0-7.5-7.45 7.46 7.46 0 0 0 7.5 7.45zm0-10.91a3.45 3.45 0 1 1-3.5 3.46A3.46 3.46 0 0 1 14.17 4zM14.17 16.47A14.18 14.18 0 0 0 0 30.68c0 1.41.66 4 5.11 5.66a27.17 27.17 0 0 0 9.06 1.34c6.54 0 14.17-1.84 14.17-7a14.18 14.18 0 0 0-14.17-14.21zm0 17.21c-6.3 0-10.17-1.77-10.17-3a10.17 10.17 0 1 1 20.33 0c.01 1.23-3.86 3-10.16 3z"></path>
                            </svg>
                            <span class="icon__fallback-text">Log in</span>
                        </a>



                        <a href="http://opencart3.vm/index.php?route=checkout/cart&amp;language=en-gb" class="site-header__cart">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-cart" viewBox="0 0 37 40">
                                <path d="M36.5 34.8L33.3 8h-5.9C26.7 3.9 23 .8 18.5.8S10.3 3.9 9.6 8H3.7L.5 34.8c-.2 1.5.4 2.4.9 3 .5.5 1.4 1.2 3.1 1.2h28c1.3 0 2.4-.4 3.1-1.3.7-.7 1-1.8.9-2.9zm-18-30c2.2 0 4.1 1.4 4.7 3.2h-9.5c.7-1.9 2.6-3.2 4.8-3.2zM4.5 35l2.8-23h2.2v3c0 1.1.9 2 2 2s2-.9 2-2v-3h10v3c0 1.1.9 2 2 2s2-.9 2-2v-3h2.2l2.8 23h-28z"></path>
                            </svg>
                            <span class="visually-hidden">Cart</span>
                            <span class="icon__fallback-text">Cart</span>

                            <div id="CartCount" class="site-header__cart-count">
                                <span>0</span>
                                <span class="icon__fallback-text medium-up--hide">items</span>
                            </div>
                        </a>


                        <button type="button" class="btn--link site-header__menu js-mobile-nav-toggle mobile-nav--open">
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-hamburger" viewBox="0 0 37 40">
                                <path d="M33.5 25h-30c-1.1 0-2-.9-2-2s.9-2 2-2h30c1.1 0 2 .9 2 2s-.9 2-2 2zm0-11.5h-30c-1.1 0-2-.9-2-2s.9-2 2-2h30c1.1 0 2 .9 2 2s-.9 2-2 2zm0 23h-30c-1.1 0-2-.9-2-2s.9-2 2-2h30c1.1 0 2 .9 2 2s-.9 2-2 2z"></path>
                            </svg>
                            <svg aria-hidden="true" focusable="false" role="presentation" class="icon icon-close" viewBox="0 0 37 40">
                                <path d="M21.3 23l11-11c.8-.8.8-2 0-2.8-.8-.8-2-.8-2.8 0l-11 11-11-11c-.8-.8-2-.8-2.8 0-.8.8-.8 2 0 2.8l11 11-11 11c-.8.8-.8 2 0 2.8.4.4.9.6 1.4.6s1-.2 1.4-.6l11-11 11 11c.4.4.9.6 1.4.6s1-.2 1.4-.6c.8-.8.8-2 0-2.8l-11-11z"></path>
                            </svg>
                            <span class="icon__fallback-text">expand/collapse</span>
                        </button>

                    </div>

                </div>
            </div>
        </header>


    </div>


</div>


<div id="common-home" class="container">
    <div class="row">
        <div id="content" class="col-sm-12">

            <link href="catalog/view/theme/barifox/stylesheet/css/swiper.min.css" rel="stylesheet" type="text/css" media="all">

            <style>
                .swiper-container {
                    width: 100%;
                    height: 300px;
                }
                .swiper-container  img{
                    width: 100%;
                    height: 300px;
                }
                .swiper-container-fade .swiper-slide-active, .swiper-container-fade .swiper-slide-active .swiper-slide-active {
                    pointer-events: none;
                }
                @media screen and (min-width: 749px) {
                    .swiper-container {
                        width: 100%;
                        height: 650px;
                        margin: 0 auto;
                    }
                    .swiper-container  img{
                        width: 100%;
                        height: 650px;
                        margin: 0 auto;
                    }
                }
            </style>

            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <a href="index.php?route=product/product&amp;path=57&amp;product_id=49"><img src="http://opencart3.vm/image/cache/catalog/QQ图片20180824162857-1920x700-1920x700.png" alt=""></a>
                    </div>
                    <div class="swiper-slide">
                        <a href=""><img src="http://opencart3.vm/image/cache/catalog/QQ图片20180824162903-1920x700-1920x700.jpg" alt=""></a>
                    </div>
                    <div class="swiper-slide">
                        <a href=""><img src="http://opencart3.vm/image/cache/catalog/QQ图片20180824162910-1920x700-1920x700.jpg" alt=""></a>
                    </div>
                </div>
                <!-- 如果需要分页器 -->
                <div class="swiper-pagination"></div>
            </div>



            <script src="catalog/view/theme/barifox/js/swiper.min.js"></script>
            <script>
                var mySwiper = new Swiper ('.swiper-container', {
                    direction: 'horizontal',
                    effect : 'fade',
                    loop: true,
                    autoplay: {
                        delay: 3000,
                        stopOnLastSlide: false,
                        disableOnInteraction: true,
                    },
                    // 如果需要分页器
                    pagination: {
                        el: '.swiper-pagination',
                    },
                })
            </script>
            <div id="shopify-section-1525319444320" class="shopify-section index-section">
                <div class="page-width">
                    <div class="section-header text-center">
                        <h2>Featured</h2>
                    </div>

                    <div class="collection-grid">
                        <div class="grid grid--uniform">

                            <div class="grid__item small--one-half medium-up--one-third">

                                <div class="collection-grid-item">
                                    <a href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=43" class="collection-grid-item__link">
                                        <div class="collection-grid-item__overlay box ratio-container js lazyloaded" data-bgset="" data-parent-fit="cover" style="background-image: url(http://opencart3.vm/image/cache/catalog/demo/macbook_1-400x400.jpg);">
                                            <picture style="display: none;">
                                                <source data-srcset="" sizes="339px" srcset="">
                                                <img alt="" class="lazyautosizes lazyloaded" data-sizes="auto" data-parent-fit="cover" sizes="339px">
                                            </picture>
                                        </div>

                                        <div class="collection-grid-item__title-wrapper">
                                            <h3 class="collection-grid-item__title">
                                                MacBook
                                            </h3>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="grid__item small--one-half medium-up--one-third">

                                <div class="collection-grid-item">
                                    <a href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=40" class="collection-grid-item__link">
                                        <div class="collection-grid-item__overlay box ratio-container js lazyloaded" data-bgset="" data-parent-fit="cover" style="background-image: url(http://opencart3.vm/image/cache/catalog/demo/iphone_1-400x400.jpg);">
                                            <picture style="display: none;">
                                                <source data-srcset="" sizes="339px" srcset="">
                                                <img alt="" class="lazyautosizes lazyloaded" data-sizes="auto" data-parent-fit="cover" sizes="339px">
                                            </picture>
                                        </div>

                                        <div class="collection-grid-item__title-wrapper">
                                            <h3 class="collection-grid-item__title">
                                                iPhone
                                            </h3>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="grid__item small--one-half medium-up--one-third">

                                <div class="collection-grid-item">
                                    <a href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=42" class="collection-grid-item__link">
                                        <div class="collection-grid-item__overlay box ratio-container js lazyloaded" data-bgset="" data-parent-fit="cover" style="background-image: url(http://opencart3.vm/image/cache/catalog/demo/apple_cinema_30-400x400.jpg);">
                                            <picture style="display: none;">
                                                <source data-srcset="" sizes="339px" srcset="">
                                                <img alt="" class="lazyautosizes lazyloaded" data-sizes="auto" data-parent-fit="cover" sizes="339px">
                                            </picture>
                                        </div>

                                        <div class="collection-grid-item__title-wrapper">
                                            <h3 class="collection-grid-item__title">
                                                Apple Cinema 30&quot;
                                            </h3>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="shopify-section-featured-collections" class="shopify-section index-section">
                <div class="page-width">
                    <div class="section-header text-center">
                        <h2>NEW ARRIVALS</h2>
                    </div>

                    <div class="grid grid--uniform grid--view-items">
                        <div class="grid__item grid__item--featured-collections small--one-half medium-up--one-quarter">
                            <div class="grid-view-item">
                                <a class="grid-view-item__link grid-view-item__image-container" href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=42">
                                    <div id="ProductCardImageWrapper-featured-collections-741270388802" class="grid-view-item__image-wrapper js">
                                        <div style="padding-top:100.0%;">
                                            <img id="ProductCardImage-featured-collections-741270388802" class="grid-view-item__image lazyautosizes lazyloading"
                                                 src="http://opencart3.vm/image/cache/catalog/demo/apple_cinema_30-250x250.jpg"
                                                 data-aspectratio="1.0" data-sizes="auto" alt="Apple Cinema 30&quot;">
                                        </div>
                                    </div>

                                    <div class="h4 grid-view-item__title">Apple Cinema 30&quot;</div>

                                    <div class="grid-view-item__meta">
                                        <!-- snippet/product-price.liquid -->
                                        <span class="visually-hidden">Regular price</span>
                                        <s class="product-price__price">$100.00</s>
                                        <span class="product-price__price product-price__sale">
                                            $90.00
                                            <span class="product-price__sale-label">Sale</span>
                                </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="grid__item grid__item--featured-collections small--one-half medium-up--one-quarter">
                            <div class="grid-view-item">
                                <a class="grid-view-item__link grid-view-item__image-container" href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=30">
                                    <div id="ProductCardImageWrapper-featured-collections-741270388802" class="grid-view-item__image-wrapper js">
                                        <div style="padding-top:100.0%;">
                                            <img id="ProductCardImage-featured-collections-741270388802" class="grid-view-item__image lazyautosizes lazyloading"
                                                 src="http://opencart3.vm/image/cache/catalog/demo/canon_eos_5d_1-250x250.jpg"
                                                 data-aspectratio="1.0" data-sizes="auto" alt="Canon EOS 5D">
                                        </div>
                                    </div>

                                    <div class="h4 grid-view-item__title">Canon EOS 5D</div>

                                    <div class="grid-view-item__meta">
                                        <!-- snippet/product-price.liquid -->
                                        <span class="visually-hidden">Regular price</span>
                                        <s class="product-price__price">$100.00</s>
                                        <span class="product-price__price product-price__sale">
                                            $80.00
                                            <span class="product-price__sale-label">Sale</span>
                                </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="grid__item grid__item--featured-collections small--one-half medium-up--one-quarter">
                            <div class="grid-view-item">
                                <a class="grid-view-item__link grid-view-item__image-container" href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=47">
                                    <div id="ProductCardImageWrapper-featured-collections-741270388802" class="grid-view-item__image-wrapper js">
                                        <div style="padding-top:100.0%;">
                                            <img id="ProductCardImage-featured-collections-741270388802" class="grid-view-item__image lazyautosizes lazyloading"
                                                 src="http://opencart3.vm/image/cache/catalog/demo/hp_1-250x250.jpg"
                                                 data-aspectratio="1.0" data-sizes="auto" alt="HP LP3065">
                                        </div>
                                    </div>

                                    <div class="h4 grid-view-item__title">HP LP3065</div>

                                    <div class="grid-view-item__meta">
                                        <!-- snippet/product-price.liquid -->
                                        <span class="visually-hidden">Regular price</span>
                                        <s class="product-price__price">$100.00</s>
                                        <span class="product-price__price product-price__sale">

                                            <span class="product-price__sale-label">Sale</span>
                                </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="grid__item grid__item--featured-collections small--one-half medium-up--one-quarter">
                            <div class="grid-view-item">
                                <a class="grid-view-item__link grid-view-item__image-container" href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=28">
                                    <div id="ProductCardImageWrapper-featured-collections-741270388802" class="grid-view-item__image-wrapper js">
                                        <div style="padding-top:100.0%;">
                                            <img id="ProductCardImage-featured-collections-741270388802" class="grid-view-item__image lazyautosizes lazyloading"
                                                 src="http://opencart3.vm/image/cache/catalog/demo/htc_touch_hd_1-250x250.jpg"
                                                 data-aspectratio="1.0" data-sizes="auto" alt="HTC Touch HD">
                                        </div>
                                    </div>

                                    <div class="h4 grid-view-item__title">HTC Touch HD</div>

                                    <div class="grid-view-item__meta">
                                        <!-- snippet/product-price.liquid -->
                                        <span class="visually-hidden">Regular price</span>
                                        <s class="product-price__price">$100.00</s>
                                        <span class="product-price__price product-price__sale">

                                            <span class="product-price__sale-label">Sale</span>
                                </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                        <div class="grid__item grid__item--featured-collections small--one-half medium-up--one-quarter">
                            <div class="grid-view-item">
                                <a class="grid-view-item__link grid-view-item__image-container" href="http://opencart3.vm/index.php?route=product/product&amp;language=en-gb&amp;product_id=41">
                                    <div id="ProductCardImageWrapper-featured-collections-741270388802" class="grid-view-item__image-wrapper js">
                                        <div style="padding-top:100.0%;">
                                            <img id="ProductCardImage-featured-collections-741270388802" class="grid-view-item__image lazyautosizes lazyloading"
                                                 src="http://opencart3.vm/image/cache/catalog/demo/imac_1-250x250.jpg"
                                                 data-aspectratio="1.0" data-sizes="auto" alt="iMac">
                                        </div>
                                    </div>

                                    <div class="h4 grid-view-item__title">iMac</div>

                                    <div class="grid-view-item__meta">
                                        <!-- snippet/product-price.liquid -->
                                        <span class="visually-hidden">Regular price</span>
                                        <s class="product-price__price">$100.00</s>
                                        <span class="product-price__price product-price__sale">

                                            <span class="product-price__sale-label">Sale</span>
                                </span>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>


            </div><!-- END content_for_index -->
        </div>
    </div>
</div>

<footer class="site-footer" role="contentinfo">
    <div class="page-width">
        <div class="grid grid--no-gutters">
            <div class="grid__item text-center">

                <ul class="site-footer__linklist site-footer__linklist--center">
                    <li class="site-footer__linklist-item">
                        <a href="http://opencart3.vm/index.php?route=information/information&amp;language=en-gb&amp;information_id=4">About Us</a>
                    </li>
                    <li class="site-footer__linklist-item">
                        <a href="http://opencart3.vm/index.php?route=information/information&amp;language=en-gb&amp;information_id=6">Delivery Information</a>
                    </li>
                    <li class="site-footer__linklist-item">
                        <a href="http://opencart3.vm/index.php?route=information/information&amp;language=en-gb&amp;information_id=3">Privacy Policy</a>
                    </li>
                    <li class="site-footer__linklist-item">
                        <a href="http://opencart3.vm/index.php?route=information/information&amp;language=en-gb&amp;information_id=5">Terms &amp; Conditions</a>
                    </li>
                </ul>

            </div>

            <div class="grid__item text-center">

            </div>


        </div>

        <div class="grid grid--no-gutters">

            <div class="grid__item text-center">
                <div class="site-footer__copyright">
                    <small class="site-footer__copyright-content"> 2019 &copy; Your Store . All Rights Reserved.</small>
                </div>
            </div>
        </div>
    </div>
</footer>

</body></html>
