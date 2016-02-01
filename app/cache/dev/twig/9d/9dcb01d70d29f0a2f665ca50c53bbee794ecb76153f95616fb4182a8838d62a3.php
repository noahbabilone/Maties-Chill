<?php

/* MCBundle::layout.html.twig */
class __TwigTemplate_b13141327b0b246a4ac0039e400ffac08b311ed4133127ce95a90474bcdab558 extends Twig_Template
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
        $__internal_1e7218f3dc503c4d10afab987dfe9cd67cc6161dd97ef93f3a4bd24da2f5056c = $this->env->getExtension("native_profiler");
        $__internal_1e7218f3dc503c4d10afab987dfe9cd67cc6161dd97ef93f3a4bd24da2f5056c->enter($__internal_1e7218f3dc503c4d10afab987dfe9cd67cc6161dd97ef93f3a4bd24da2f5056c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle::layout.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1e7218f3dc503c4d10afab987dfe9cd67cc6161dd97ef93f3a4bd24da2f5056c->leave($__internal_1e7218f3dc503c4d10afab987dfe9cd67cc6161dd97ef93f3a4bd24da2f5056c_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_51b97808ebbcae7e5d7bdd9e4092f4cc085241255fcf56756d999512efa99a17 = $this->env->getExtension("native_profiler");
        $__internal_51b97808ebbcae7e5d7bdd9e4092f4cc085241255fcf56756d999512efa99a17->enter($__internal_51b97808ebbcae7e5d7bdd9e4092f4cc085241255fcf56756d999512efa99a17_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_51b97808ebbcae7e5d7bdd9e4092f4cc085241255fcf56756d999512efa99a17->leave($__internal_51b97808ebbcae7e5d7bdd9e4092f4cc085241255fcf56756d999512efa99a17_prof);

    }

    // line 7
    public function block_body($context, array $blocks = array())
    {
        $__internal_75905208a29f3a882069d9b5208deb89ea4023b0185a1b5518ee9a8b62f20823 = $this->env->getExtension("native_profiler");
        $__internal_75905208a29f3a882069d9b5208deb89ea4023b0185a1b5518ee9a8b62f20823->enter($__internal_75905208a29f3a882069d9b5208deb89ea4023b0185a1b5518ee9a8b62f20823_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 8
        echo "    ";
        $this->displayBlock('body_mc', $context, $blocks);
        
        $__internal_75905208a29f3a882069d9b5208deb89ea4023b0185a1b5518ee9a8b62f20823->leave($__internal_75905208a29f3a882069d9b5208deb89ea4023b0185a1b5518ee9a8b62f20823_prof);

    }

    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_3cde39efb26687a52807f1726b5eed4cb4fd903ad0f50f92df9b1f926f6aecb3 = $this->env->getExtension("native_profiler");
        $__internal_3cde39efb26687a52807f1726b5eed4cb4fd903ad0f50f92df9b1f926f6aecb3->enter($__internal_3cde39efb26687a52807f1726b5eed4cb4fd903ad0f50f92df9b1f926f6aecb3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 9
        echo "
    ";
        
        $__internal_3cde39efb26687a52807f1726b5eed4cb4fd903ad0f50f92df9b1f926f6aecb3->leave($__internal_3cde39efb26687a52807f1726b5eed4cb4fd903ad0f50f92df9b1f926f6aecb3_prof);

    }

    // line 14
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_74546d4cb59b6dc4a4e3b4fdaf95d709ea232765ac674d8f55eb2ae8df2f5171 = $this->env->getExtension("native_profiler");
        $__internal_74546d4cb59b6dc4a4e3b4fdaf95d709ea232765ac674d8f55eb2ae8df2f5171->enter($__internal_74546d4cb59b6dc4a4e3b4fdaf95d709ea232765ac674d8f55eb2ae8df2f5171_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        // line 15
        echo "    ";
        $this->displayParentBlock("javascripts", $context, $blocks);
        echo "

";
        
        $__internal_74546d4cb59b6dc4a4e3b4fdaf95d709ea232765ac674d8f55eb2ae8df2f5171->leave($__internal_74546d4cb59b6dc4a4e3b4fdaf95d709ea232765ac674d8f55eb2ae8df2f5171_prof);

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
