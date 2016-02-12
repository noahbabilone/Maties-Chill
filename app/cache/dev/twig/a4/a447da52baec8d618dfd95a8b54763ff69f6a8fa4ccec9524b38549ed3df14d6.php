<?php

/* @Framework/Form/form_widget_compound.html.php */
class __TwigTemplate_5bb4c682cb222c5aa7d1086033fd07e8cfdf4105f13d12d4f914293a127838c1 extends Twig_Template
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
        $__internal_04883de5f1d65815f06adcc929d6c9dd64b7ce3dd7ed8501977a8d235d2ff574 = $this->env->getExtension("native_profiler");
        $__internal_04883de5f1d65815f06adcc929d6c9dd64b7ce3dd7ed8501977a8d235d2ff574->enter($__internal_04883de5f1d65815f06adcc929d6c9dd64b7ce3dd7ed8501977a8d235d2ff574_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget_compound.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <?php echo \$view['form']->errors(\$form) ?>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</div>
";
        
        $__internal_04883de5f1d65815f06adcc929d6c9dd64b7ce3dd7ed8501977a8d235d2ff574->leave($__internal_04883de5f1d65815f06adcc929d6c9dd64b7ce3dd7ed8501977a8d235d2ff574_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <?php echo $view['form']->errors($form) ?>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </div>*/
/* */
