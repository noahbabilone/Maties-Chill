<?php

/* MCBundle:Pages:index.html.twig */
class __TwigTemplate_102c080fd0fefb35f6462cd01a4a2be49d97343060af1cd316e4ed70c56efdf1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("MCBundle::layout.html.twig", "MCBundle:Pages:index.html.twig", 1);
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
        $__internal_4dedde7f79132443ba8fe2795e7cfe5177cce35a28b98feca78f5c630d6559cd = $this->env->getExtension("native_profiler");
        $__internal_4dedde7f79132443ba8fe2795e7cfe5177cce35a28b98feca78f5c630d6559cd->enter($__internal_4dedde7f79132443ba8fe2795e7cfe5177cce35a28b98feca78f5c630d6559cd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Pages:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_4dedde7f79132443ba8fe2795e7cfe5177cce35a28b98feca78f5c630d6559cd->leave($__internal_4dedde7f79132443ba8fe2795e7cfe5177cce35a28b98feca78f5c630d6559cd_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_b5eae8dc3748d014a0ac38d245386093724ba6c99c5dfcbb0919e773ed9f2cbb = $this->env->getExtension("native_profiler");
        $__internal_b5eae8dc3748d014a0ac38d245386093724ba6c99c5dfcbb0919e773ed9f2cbb->enter($__internal_b5eae8dc3748d014a0ac38d245386093724ba6c99c5dfcbb0919e773ed9f2cbb_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_b5eae8dc3748d014a0ac38d245386093724ba6c99c5dfcbb0919e773ed9f2cbb->leave($__internal_b5eae8dc3748d014a0ac38d245386093724ba6c99c5dfcbb0919e773ed9f2cbb_prof);

    }

    // line 7
    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_68956ac10c6d311edccfb4b4db1c170d95bef1f705c11a1106a7d5857051772c = $this->env->getExtension("native_profiler");
        $__internal_68956ac10c6d311edccfb4b4db1c170d95bef1f705c11a1106a7d5857051772c->enter($__internal_68956ac10c6d311edccfb4b4db1c170d95bef1f705c11a1106a7d5857051772c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

        // line 8
        echo "
    <div class=\"text-center\">
        <h1 class=\"text-info\">Partager vos séance de ciné !</h1>

        <p class=\"lead\">
            Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus
            commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>

        <p><a class=\"btn btn-lg btn-success\" href=\"#\" role=\"button\">Get started today</a></p>
    </div>

";
        
        $__internal_68956ac10c6d311edccfb4b4db1c170d95bef1f705c11a1106a7d5857051772c->leave($__internal_68956ac10c6d311edccfb4b4db1c170d95bef1f705c11a1106a7d5857051772c_prof);

    }

    public function getTemplateName()
    {
        return "MCBundle:Pages:index.html.twig";
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
/*     Accueil - {{ parent() }}*/
/* {% endblock %}*/
/* */
/* {% block body_mc %}*/
/* */
/*     <div class="text-center">*/
/*         <h1 class="text-info">Partager vos séance de ciné !</h1>*/
/* */
/*         <p class="lead">*/
/*             Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus*/
/*             commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet.</p>*/
/* */
/*         <p><a class="btn btn-lg btn-success" href="#" role="button">Get started today</a></p>*/
/*     </div>*/
/* */
/* {% endblock %}*/
/* */
