<?php

/* TwigBundle:Exception:error.rdf.twig */
class __TwigTemplate_775e872242d118c8d5712440484a8f385c6ca381711d64bc5a4491bc06d2097d extends Twig_Template
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
        $__internal_3644ab1e76768fd1412818fb0adf5b3f942a2e405c0ac041af6e9c691fb1c108 = $this->env->getExtension("native_profiler");
        $__internal_3644ab1e76768fd1412818fb0adf5b3f942a2e405c0ac041af6e9c691fb1c108->enter($__internal_3644ab1e76768fd1412818fb0adf5b3f942a2e405c0ac041af6e9c691fb1c108_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.rdf.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.rdf.twig", 1)->display($context);
        
        $__internal_3644ab1e76768fd1412818fb0adf5b3f942a2e405c0ac041af6e9c691fb1c108->leave($__internal_3644ab1e76768fd1412818fb0adf5b3f942a2e405c0ac041af6e9c691fb1c108_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.rdf.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
