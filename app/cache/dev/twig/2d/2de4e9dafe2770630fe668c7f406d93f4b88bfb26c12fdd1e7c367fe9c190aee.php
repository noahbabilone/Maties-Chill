<?php

/* @Framework/Form/choice_widget_expanded.html.php */
class __TwigTemplate_631efe93e421d3bd8b0a1a6719bd61025e78ad95573d720edf5c94fc2635939a extends Twig_Template
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
        $__internal_13ca25a9f7794da958e6df2d8222e3b70543db19e49ae7183539890e6b805943 = $this->env->getExtension("native_profiler");
        $__internal_13ca25a9f7794da958e6df2d8222e3b70543db19e49ae7183539890e6b805943->enter($__internal_13ca25a9f7794da958e6df2d8222e3b70543db19e49ae7183539890e6b805943_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget_expanded.html.php"));

        // line 1
        echo "<div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
<?php foreach (\$form as \$child): ?>
    <?php echo \$view['form']->widget(\$child) ?>
    <?php echo \$view['form']->label(\$child, null, array('translation_domain' => \$choice_translation_domain)) ?>
<?php endforeach ?>
</div>
";
        
        $__internal_13ca25a9f7794da958e6df2d8222e3b70543db19e49ae7183539890e6b805943->leave($__internal_13ca25a9f7794da958e6df2d8222e3b70543db19e49ae7183539890e6b805943_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget_expanded.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/* <?php foreach ($form as $child): ?>*/
/*     <?php echo $view['form']->widget($child) ?>*/
/*     <?php echo $view['form']->label($child, null, array('translation_domain' => $choice_translation_domain)) ?>*/
/* <?php endforeach ?>*/
/* </div>*/
/* */
