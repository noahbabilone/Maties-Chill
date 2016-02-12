<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        if (0 === strpos($pathinfo, '/css/741e17a')) {
            // _assetic_741e17a
            if ($pathinfo === '/css/741e17a.css') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => '741e17a',  'pos' => NULL,  '_format' => 'css',  '_route' => '_assetic_741e17a',);
            }

            if (0 === strpos($pathinfo, '/css/741e17a_')) {
                if (0 === strpos($pathinfo, '/css/741e17a_bootstrap')) {
                    // _assetic_741e17a_0
                    if ($pathinfo === '/css/741e17a_bootstrap.min_1.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '741e17a',  'pos' => 0,  '_format' => 'css',  '_route' => '_assetic_741e17a_0',);
                    }

                    // _assetic_741e17a_1
                    if ($pathinfo === '/css/741e17a_bootstrap-theme.min_2.css') {
                        return array (  '_controller' => 'assetic.controller:render',  'name' => '741e17a',  'pos' => 1,  '_format' => 'css',  '_route' => '_assetic_741e17a_1',);
                    }

                }

                // _assetic_741e17a_2
                if ($pathinfo === '/css/741e17a_style_3.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '741e17a',  'pos' => 2,  '_format' => 'css',  '_route' => '_assetic_741e17a_2',);
                }

                // _assetic_741e17a_3
                if ($pathinfo === '/css/741e17a_heroic-features_4.css') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => '741e17a',  'pos' => 3,  '_format' => 'css',  '_route' => '_assetic_741e17a_3',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/js/afefa29')) {
            // _assetic_afefa29
            if ($pathinfo === '/js/afefa29.js') {
                return array (  '_controller' => 'assetic.controller:render',  'name' => 'afefa29',  'pos' => NULL,  '_format' => 'js',  '_route' => '_assetic_afefa29',);
            }

            if (0 === strpos($pathinfo, '/js/afefa29_')) {
                // _assetic_afefa29_0
                if ($pathinfo === '/js/afefa29_jquery-1.12.0.min_1.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'afefa29',  'pos' => 0,  '_format' => 'js',  '_route' => '_assetic_afefa29_0',);
                }

                // _assetic_afefa29_1
                if ($pathinfo === '/js/afefa29_bootstrap.min_2.js') {
                    return array (  '_controller' => 'assetic.controller:render',  'name' => 'afefa29',  'pos' => 1,  '_format' => 'js',  '_route' => '_assetic_afefa29_1',);
                }

            }

        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            // _twig_error_test
            if (0 === strpos($pathinfo, '/_error') && preg_match('#^/_error/(?P<code>\\d+)(?:\\.(?P<_format>[^/]++))?$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_twig_error_test')), array (  '_controller' => 'twig.controller.preview_error:previewErrorPageAction',  '_format' => 'html',));
            }

        }

        // mc_homepage
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'mc_homepage');
            }

            return array (  '_controller' => 'MCBundle\\Controller\\MatiesChillController::indexAction',  '_route' => 'mc_homepage',);
        }

        // mc_sessions
        if ($pathinfo === '/sessions') {
            return array (  '_controller' => 'MCBundle\\Controller\\MatiesChillController::sessionAction',  '_route' => 'mc_sessions',);
        }

        // mc_films
        if ($pathinfo === '/films') {
            return array (  '_controller' => 'MCBundle\\Controller\\MatiesChillController::filmAction',  '_route' => 'mc_films',);
        }

        // mc_search_film
        if ($pathinfo === '/search') {
            return array (  '_controller' => 'MCBundle\\Controller\\MatiesChillController::searchFilmAction',  '_route' => 'mc_search_film',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
