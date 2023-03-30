<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/colis' => [[['_route' => 'app_colis', '_controller' => 'App\\Controller\\ColisController::index'], null, null, null, false, false, null]],
        '/colis/add' => [[['_route' => 'add_colis', '_controller' => 'App\\Controller\\ColisController::addcolis'], null, null, null, false, false, null]],
        '/livraison' => [[['_route' => 'app_livraison', '_controller' => 'App\\Controller\\LivraisonController::index'], null, null, null, false, false, null]],
        '/livreur' => [[['_route' => 'app_livreur', '_controller' => 'App\\Controller\\LivreurController::index'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/colis/(?'
                    .'|update/([^/]++)(*:32)'
                    .'|delete/([^/]++)(*:54)'
                .')'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:93)'
                    .'|wdt/([^/]++)(*:112)'
                    .'|profiler/([^/]++)(?'
                        .'|/(?'
                            .'|search/results(*:158)'
                            .'|router(*:172)'
                            .'|exception(?'
                                .'|(*:192)'
                                .'|\\.css(*:205)'
                            .')'
                        .')'
                        .'|(*:215)'
                    .')'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        32 => [[['_route' => 'update_colis', '_controller' => 'App\\Controller\\ColisController::update'], ['id'], null, null, false, true, null]],
        54 => [[['_route' => 'delete_colis', '_controller' => 'App\\Controller\\ColisController::delete'], ['id'], null, null, false, true, null]],
        93 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        112 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        158 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        172 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        192 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        205 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        215 => [
            [['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
