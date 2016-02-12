<?php

/* TwigBundle:Exception:error.css.twig */
class __TwigTemplate_df410fba658ef013f308fcdfdb0536eaca12461c208487bbbe590389cbfc750b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_339f460e9040531d6531e1f63dc13b303708b7eefeb09078ebfa1bac714f5dd5 = $this->env->getExtension("native_profiler");
        $__internal_339f460e9040531d6531e1f63dc13b303708b7eefeb09078ebfa1bac714f5dd5->enter($__internal_339f460e9040531d6531e1f63dc13b303708b7eefeb09078ebfa1bac714f5dd5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.css.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "css", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "css", null, true);
        echo "

*/
";
        
        $__internal_339f460e9040531d6531e1f63dc13b303708b7eefeb09078ebfa1bac714f5dd5->leave($__internal_339f460e9040531d6531e1f63dc13b303708b7eefeb09078ebfa1bac714f5dd5_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.css.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  25 => 2,  22 => 1,);
    }
}
/* /**/
/* {{ status_code }} {{ status_text }}*/
/* */
/* *//* */
/* */
