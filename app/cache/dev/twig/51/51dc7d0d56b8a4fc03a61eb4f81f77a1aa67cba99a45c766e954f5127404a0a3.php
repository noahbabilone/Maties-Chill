<?php

/* @Framework/Form/form_row.html.php */
class __TwigTemplate_c6931f7442ea64a2bbe60db7d9545a6650626397f45d8d5a43db90c7fc21a915 extends Twig_Template
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
        $__internal_d4b9ce301a3e4bcad5f789ac940370db4648e35771b97b8bb62776c6ede0588d = $this->env->getExtension("native_profiler");
        $__internal_d4b9ce301a3e4bcad5f789ac940370db4648e35771b97b8bb62776c6ede0588d->enter($__internal_d4b9ce301a3e4bcad5f789ac940370db4648e35771b97b8bb62776c6ede0588d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_row.html.php"));

        // line 1
        echo "<div>
    <?php echo \$view['form']->label(\$form) ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php echo \$view['form']->widget(\$form) ?>
</div>
";
        
        $__internal_d4b9ce301a3e4bcad5f789ac940370db4648e35771b97b8bb62776c6ede0588d->leave($__internal_d4b9ce301a3e4bcad5f789ac940370db4648e35771b97b8bb62776c6ede0588d_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div>*/
/*     <?php echo $view['form']->label($form) ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php echo $view['form']->widget($form) ?>*/
/* </div>*/
/* */
