<?php

/* @Framework/Form/checkbox_widget.html.php */
class __TwigTemplate_b3daedda2fc80b04ef67ad73ef0f0cca4717f4fa306a8616108079492b90f8ce extends Twig_Template
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
        $__internal_8e5a511b81816113ea82b67ee32b76d218e64484e17320e21383b236f88ec264 = $this->env->getExtension("native_profiler");
        $__internal_8e5a511b81816113ea82b67ee32b76d218e64484e17320e21383b236f88ec264->enter($__internal_8e5a511b81816113ea82b67ee32b76d218e64484e17320e21383b236f88ec264_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/checkbox_widget.html.php"));

        // line 1
        echo "<input type=\"checkbox\"
    <?php echo \$view['form']->block(\$form, 'widget_attributes') ?>
    <?php if (strlen(\$value) > 0): ?> value=\"<?php echo \$view->escape(\$value) ?>\"<?php endif ?>
    <?php if (\$checked): ?> checked=\"checked\"<?php endif ?>
/>
";
        
        $__internal_8e5a511b81816113ea82b67ee32b76d218e64484e17320e21383b236f88ec264->leave($__internal_8e5a511b81816113ea82b67ee32b76d218e64484e17320e21383b236f88ec264_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/checkbox_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <input type="checkbox"*/
/*     <?php echo $view['form']->block($form, 'widget_attributes') ?>*/
/*     <?php if (strlen($value) > 0): ?> value="<?php echo $view->escape($value) ?>"<?php endif ?>*/
/*     <?php if ($checked): ?> checked="checked"<?php endif ?>*/
/* />*/
/* */
