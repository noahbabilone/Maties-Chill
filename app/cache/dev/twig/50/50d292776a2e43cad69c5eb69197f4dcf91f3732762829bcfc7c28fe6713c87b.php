<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_d5bac10c3f126e1d5574737305949456727658f65d643ced1670212b9b5ef9df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_edff0e93cbe14853c637da33a8134db530247859436cbda119b035f8438506c1 = $this->env->getExtension("native_profiler");
        $__internal_edff0e93cbe14853c637da33a8134db530247859436cbda119b035f8438506c1->enter($__internal_edff0e93cbe14853c637da33a8134db530247859436cbda119b035f8438506c1_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_edff0e93cbe14853c637da33a8134db530247859436cbda119b035f8438506c1->leave($__internal_edff0e93cbe14853c637da33a8134db530247859436cbda119b035f8438506c1_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_ca05771828e747b95add74624a6113382a9360ec8d0d32384813b51c1b36011f = $this->env->getExtension("native_profiler");
        $__internal_ca05771828e747b95add74624a6113382a9360ec8d0d32384813b51c1b36011f->enter($__internal_ca05771828e747b95add74624a6113382a9360ec8d0d32384813b51c1b36011f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_ca05771828e747b95add74624a6113382a9360ec8d0d32384813b51c1b36011f->leave($__internal_ca05771828e747b95add74624a6113382a9360ec8d0d32384813b51c1b36011f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_45be99d06e689dda279f7a144f684afbd1df576a5e0c0fad3abcdf973dfa5e99 = $this->env->getExtension("native_profiler");
        $__internal_45be99d06e689dda279f7a144f684afbd1df576a5e0c0fad3abcdf973dfa5e99->enter($__internal_45be99d06e689dda279f7a144f684afbd1df576a5e0c0fad3abcdf973dfa5e99_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_45be99d06e689dda279f7a144f684afbd1df576a5e0c0fad3abcdf973dfa5e99->leave($__internal_45be99d06e689dda279f7a144f684afbd1df576a5e0c0fad3abcdf973dfa5e99_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_c0e992ba7b0c9183f3b166c5d52b3c24ffd1a4e4430a6d45c54b31e5d0d7f617 = $this->env->getExtension("native_profiler");
        $__internal_c0e992ba7b0c9183f3b166c5d52b3c24ffd1a4e4430a6d45c54b31e5d0d7f617->enter($__internal_c0e992ba7b0c9183f3b166c5d52b3c24ffd1a4e4430a6d45c54b31e5d0d7f617_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_c0e992ba7b0c9183f3b166c5d52b3c24ffd1a4e4430a6d45c54b31e5d0d7f617->leave($__internal_c0e992ba7b0c9183f3b166c5d52b3c24ffd1a4e4430a6d45c54b31e5d0d7f617_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
