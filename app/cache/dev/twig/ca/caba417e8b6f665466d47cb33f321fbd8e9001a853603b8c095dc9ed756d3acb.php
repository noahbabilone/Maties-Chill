<?php

/* MCBundle:Pages:index.html.twig */
class __TwigTemplate_5ede151e41dcc6c295b3f277e225823908a753d516aff686acbbe6d20c2e2082 extends Twig_Template
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
        $__internal_c480530d6f0c83f14322b1e25d24570e49624c0afdd13e31ab78420ad6c1dfe2 = $this->env->getExtension("native_profiler");
        $__internal_c480530d6f0c83f14322b1e25d24570e49624c0afdd13e31ab78420ad6c1dfe2->enter($__internal_c480530d6f0c83f14322b1e25d24570e49624c0afdd13e31ab78420ad6c1dfe2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "MCBundle:Pages:index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_c480530d6f0c83f14322b1e25d24570e49624c0afdd13e31ab78420ad6c1dfe2->leave($__internal_c480530d6f0c83f14322b1e25d24570e49624c0afdd13e31ab78420ad6c1dfe2_prof);

    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        $__internal_2a3c0e6aee597a685e75cb0f2c9d206ea50dd7b47e88e21f6bfef81bb19bdbe3 = $this->env->getExtension("native_profiler");
        $__internal_2a3c0e6aee597a685e75cb0f2c9d206ea50dd7b47e88e21f6bfef81bb19bdbe3->enter($__internal_2a3c0e6aee597a685e75cb0f2c9d206ea50dd7b47e88e21f6bfef81bb19bdbe3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 4
        echo "    Accueil - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo "
";
        
        $__internal_2a3c0e6aee597a685e75cb0f2c9d206ea50dd7b47e88e21f6bfef81bb19bdbe3->leave($__internal_2a3c0e6aee597a685e75cb0f2c9d206ea50dd7b47e88e21f6bfef81bb19bdbe3_prof);

    }

    // line 7
    public function block_body_mc($context, array $blocks = array())
    {
        $__internal_55c38f9ed1a759b2a3e8e0111f26a26df5e274f7d343269f874d638930ed9a08 = $this->env->getExtension("native_profiler");
        $__internal_55c38f9ed1a759b2a3e8e0111f26a26df5e274f7d343269f874d638930ed9a08->enter($__internal_55c38f9ed1a759b2a3e8e0111f26a26df5e274f7d343269f874d638930ed9a08_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body_mc"));

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
        
        $__internal_55c38f9ed1a759b2a3e8e0111f26a26df5e274f7d343269f874d638930ed9a08->leave($__internal_55c38f9ed1a759b2a3e8e0111f26a26df5e274f7d343269f874d638930ed9a08_prof);

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
