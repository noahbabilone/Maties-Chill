<?php

/* MCBundle::layout.html.twig */
class __TwigTemplate_f6a0442df775d9b6f248926d280955bc63bef63d11ce0e924407eb9f3432f407 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("::base.html.twig", "MCBundle::layout.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
            'body_mc' => array($this, 'block_body_mc'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_702cd1869e7963d7d6af7c7c3294cf07793d146f5f8ef075140dcf266ae54bb9 = $this->env->getExtension("native_profiler");
        $__internal_702cd1869e7963d7d6af7c7c3294cf07793d146f5f8ef075140dcf266ae54bb9->enter($__internal_702cd1869e7963d7d6af7c7c3294cf07793d146f5f8ef075140dcf266ae54bb9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_702cd1869e7963d7d6af7c7c3294cf07793d146f5f8ef075140dcf266ae54bb9->leave($__internal_702cd1869e7963d7d6af7c7c3294cf07793d146f5f8ef075140dcf266ae54bb9_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_c9d25752ee05cb189154d0d504f076b3d967b8f035844f770d4ff949e01e0a87 = $this->env->getExtension("native_profiler");
        $__internal_c9d25752ee05cb189154d0d504f076b3d967b8f035844f770d4ff949e01e0a87->enter($__internal_c9d25752ee05cb189154d0d504f076b3d967b8f035844f770d4ff949e01e0a87_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_c9d25752ee05cb189154d0d504f076b3d967b8f035844f770d4ff949e01e0a87->leave($__internal_c9d25752ee05cb189154d0d504f076b3d967b8f035844f770d4ff949e01e0a87_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_860795a66124ad53b9e285c93e0d094b1b37905a7a6ac9dde3ec9a77897d9ba7 = $this->env->getExtension("native_profiler");
        $__internal_860795a66124ad53b9e285c93e0d094b1b37905a7a6ac9dde3ec9a77897d9ba7->enter($__internal_860795a66124ad53b9e285c93e0d094b1b37905a7a6ac9dde3ec9a77897d9ba7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "    ";
        $this->displayBlock('body_mc', $context, $blocks);
        
        $__internal_860795a66124ad53b9e285c93e0d094b1b37905a7a6ac9dde3ec9a77897d9ba7->leave($__internal_860795a66124ad53b9e285c93e0d094b1b37905a7a6ac9dde3ec9a77897d9ba7_prof);

    }

    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_ab9b0e6e18c61657efedcb9b1cabe63c20f7e73d4071cef4c306dfe220c3f006 = $this->env->getExtension("native_profiler");
        $__internal_ab9b0e6e18c61657efedcb9b1cabe63c20f7e73d4071cef4c306dfe220c3f006->enter($__internal_ab9b0e6e18c61657efedcb9b1cabe63c20f7e73d4071cef4c306dfe220c3f006_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 9
        echo "
    ";
        
        $__internal_ab9b0e6e18c61657efedcb9b1cabe63c20f7e73d4071cef4c306dfe220c3f006->leave($__internal_ab9b0e6e18c61657efedcb9b1cabe63c20f7e73d4071cef4c306dfe220c3f006_prof);

    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_29de2a3291c77cede0176f5636712f35b8a9349fcda49d06e604aee98cbfaea3 = $this->env->getExtension("native_profiler");
        $__internal_29de2a3291c77cede0176f5636712f35b8a9349fcda49d06e604aee98cbfaea3->enter($__internal_29de2a3291c77cede0176f5636712f35b8a9349fcda49d06e604aee98cbfaea3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 15
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

";
        
        $__internal_29de2a3291c77cede0176f5636712f35b8a9349fcda49d06e604aee98cbfaea3->leave($__internal_29de2a3291c77cede0176f5636712f35b8a9349fcda49d06e604aee98cbfaea3_prof);

    }

    public function getTemplateName()
    {
        return "MCBundle::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 15,  80 => 14,  72 => 9,  59 => 8,  53 => 7,  43 => 4,  37 => 3,  11 => 1,);
    }
}
/* {% extends "::base.html.twig" %}*/
/* */
/* {% block title %}*/
/*     {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% block body_mc%}*/
/* */
/*     {% endblock %}*/
/* {% endblock %}*/
/* */
/* */
/* {% block javascripts %}*/
/*     {{ parent() }}*/
/* */
/* {% endblock %}*/
/* */
/* */
