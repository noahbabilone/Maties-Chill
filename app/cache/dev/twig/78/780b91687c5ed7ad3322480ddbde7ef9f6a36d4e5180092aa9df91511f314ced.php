<?php

/* TwigBundle:Exception:error.js.twig */
class __TwigTemplate_3ed45fe2709e08e47d179863c89a5bb4df28fdad515962dc573dd7ba782c4413 extends Twig_Template
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
        $__internal_40f2d8cbb933872ef75a61ac0be67e2b549d22b6ace3ac0665756a1ce696859f = $this->env->getExtension("native_profiler");
        $__internal_40f2d8cbb933872ef75a61ac0be67e2b549d22b6ace3ac0665756a1ce696859f->enter($__internal_40f2d8cbb933872ef75a61ac0be67e2b549d22b6ace3ac0665756a1ce696859f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "TwigBundle:Exception:error.js.twig"));

        // line 1
        echo "/*
";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "js", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "js", null, true);
        echo "

*/
";
        
        $__internal_40f2d8cbb933872ef75a61ac0be67e2b549d22b6ace3ac0665756a1ce696859f->leave($__internal_40f2d8cbb933872ef75a61ac0be67e2b549d22b6ace3ac0665756a1ce696859f_prof);

    }

    public function getTemplateName()
    {
        return "TwigBundle:Exception:error.js.twig";
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
