<?php

/* TwigBundle:Exception:error.atom.twig */
class __TwigTemplate_e67872bf4454a01b86b4cde521498ac3cfba2d34930d45e3d8d566d202d46d3c extends Twig_Template
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
        $__internal_14bcb14b39de6e012a929c9c38f9892e2d108bc1913e281000a8ec5bcce99365 = $this->env->getExtension("native_profiler");
        $__internal_14bcb14b39de6e012a929c9c38f9892e2d108bc1913e281000a8ec5bcce99365->enter($__internal_14bcb14b39de6e012a929c9c38f9892e2d108bc1913e281000a8ec5bcce99365_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.atom.twig"));

        // line 1
        $this->loadTemplate("@Twig/Exception/error.xml.twig", "TwigBundle:Exception:error.atom.twig", 1)->display($context);
        
        $__internal_14bcb14b39de6e012a929c9c38f9892e2d108bc1913e281000a8ec5bcce99365->leave($__internal_14bcb14b39de6e012a929c9c38f9892e2d108bc1913e281000a8ec5bcce99365_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.atom.twig";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* {% include '@Twig/Exception/error.xml.twig' %}*/
/* */
