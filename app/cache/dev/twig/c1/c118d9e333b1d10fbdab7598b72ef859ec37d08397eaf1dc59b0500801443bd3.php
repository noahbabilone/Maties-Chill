<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_c8001fc9958c6ff806aee3a58c60354bf1cf78277cd14546f71795551ce5a929 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_7999193eb36a2c2e2d8c65c0b54473d2efaed266ba60a5e0b0e7de0e00440fd7 = $this->env->getExtension("native_profiler");
        $__internal_7999193eb36a2c2e2d8c65c0b54473d2efaed266ba60a5e0b0e7de0e00440fd7->enter($__internal_7999193eb36a2c2e2d8c65c0b54473d2efaed266ba60a5e0b0e7de0e00440fd7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_7999193eb36a2c2e2d8c65c0b54473d2efaed266ba60a5e0b0e7de0e00440fd7->leave($__internal_7999193eb36a2c2e2d8c65c0b54473d2efaed266ba60a5e0b0e7de0e00440fd7_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_9635a5c3420bec9d52eaa111f6add3d0d789e23b851ce313ae8da697278e5d3a = $this->env->getExtension("native_profiler");
        $__internal_9635a5c3420bec9d52eaa111f6add3d0d789e23b851ce313ae8da697278e5d3a->enter($__internal_9635a5c3420bec9d52eaa111f6add3d0d789e23b851ce313ae8da697278e5d3a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_9635a5c3420bec9d52eaa111f6add3d0d789e23b851ce313ae8da697278e5d3a->leave($__internal_9635a5c3420bec9d52eaa111f6add3d0d789e23b851ce313ae8da697278e5d3a_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_f3ff00831d359726d70d2e29d9762718ae55633f4c4a2dd02c5f0fb501adba80 = $this->env->getExtension("native_profiler");
        $__internal_f3ff00831d359726d70d2e29d9762718ae55633f4c4a2dd02c5f0fb501adba80->enter($__internal_f3ff00831d359726d70d2e29d9762718ae55633f4c4a2dd02c5f0fb501adba80_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_f3ff00831d359726d70d2e29d9762718ae55633f4c4a2dd02c5f0fb501adba80->leave($__internal_f3ff00831d359726d70d2e29d9762718ae55633f4c4a2dd02c5f0fb501adba80_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_837616d3c698a4e3dea735d5a68806ba3365649630e59d059adf8becab6eb009 = $this->env->getExtension("native_profiler");
        $__internal_837616d3c698a4e3dea735d5a68806ba3365649630e59d059adf8becab6eb009->enter($__internal_837616d3c698a4e3dea735d5a68806ba3365649630e59d059adf8becab6eb009_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_837616d3c698a4e3dea735d5a68806ba3365649630e59d059adf8becab6eb009->leave($__internal_837616d3c698a4e3dea735d5a68806ba3365649630e59d059adf8becab6eb009_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
