<?php

/* MCBundle:Pages:sessions.html.twig */
class __TwigTemplate_1dd8176654a03be907eb41b7cc6b870e74366a1f89c3e2a5e9d11765fa090b5d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MCBundle::layout.html.twig", "MCBundle:Pages:sessions.html.twig", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'body_mc' => array($this, 'block_body_mc'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "MCBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_4f84337a2af60be63c11fd0e0dd533c60f60a2a1aa88f5e7691a25aa847ad549 = $this->env->getExtension("native_profiler");
        $__internal_4f84337a2af60be63c11fd0e0dd533c60f60a2a1aa88f5e7691a25aa847ad549->enter($__internal_4f84337a2af60be63c11fd0e0dd533c60f60a2a1aa88f5e7691a25aa847ad549_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Pages:sessions.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4f84337a2af60be63c11fd0e0dd533c60f60a2a1aa88f5e7691a25aa847ad549->leave($__internal_4f84337a2af60be63c11fd0e0dd533c60f60a2a1aa88f5e7691a25aa847ad549_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_da65a27ec6bd3e681979127c8f1ece66693ea75aa3eeb09786774a4db559a1f3 = $this->env->getExtension("native_profiler");
        $__internal_da65a27ec6bd3e681979127c8f1ece66693ea75aa3eeb09786774a4db559a1f3->enter($__internal_da65a27ec6bd3e681979127c8f1ece66693ea75aa3eeb09786774a4db559a1f3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Séances - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_da65a27ec6bd3e681979127c8f1ece66693ea75aa3eeb09786774a4db559a1f3->leave($__internal_da65a27ec6bd3e681979127c8f1ece66693ea75aa3eeb09786774a4db559a1f3_prof);

    }

    // line 7
    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_78eb803fc5c29ecf4614e6b35321948406bec3ab2785b73eb248cae42e34048e = $this->env->getExtension("native_profiler");
        $__internal_78eb803fc5c29ecf4614e6b35321948406bec3ab2785b73eb248cae42e34048e->enter($__internal_78eb803fc5c29ecf4614e6b35321948406bec3ab2785b73eb248cae42e34048e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 8
        echo "
    <div class=\"text-center\">
        <h1 class=\"text-info\">Seance</h1>

        <p class=\"lead\">
    test
        <p><a class=\"btn btn-lg btn-success\" href=\"#\" role=\"button\">Get started today</a></p>
    </div>

";
        
        $__internal_78eb803fc5c29ecf4614e6b35321948406bec3ab2785b73eb248cae42e34048e->leave($__internal_78eb803fc5c29ecf4614e6b35321948406bec3ab2785b73eb248cae42e34048e_prof);

    }

    public function getTemplateName()
    {
        return "MCBundle:Pages:sessions.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 8,  51 => 7,  41 => 4,  35 => 3,  11 => 1,);
    }
}
/* {% extends "MCBundle::layout.html.twig" %}*/
/* */
/* {% block title %}*/
/*     Séances - {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body_mc %}*/
/* */
/*     <div class="text-center">*/
/*         <h1 class="text-info">Seance</h1>*/
/* */
/*         <p class="lead">*/
/*     test*/
/*         <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
