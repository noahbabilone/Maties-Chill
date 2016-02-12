<?php

/* @Framework/Form/choice_widget.html.php */
class __TwigTemplate_2ac2a1ab4f937868f9e517ed187752e5a2d2cce6cab94b10bfb2c493827c7b3a extends Twig_Template
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
        $__internal_121b59b425058b6968b0e4f70346adf75665c11276f87f7604d0bccd06753926 = $this->env->getExtension("native_profiler");
        $__internal_121b59b425058b6968b0e4f70346adf75665c11276f87f7604d0bccd06753926->enter($__internal_121b59b425058b6968b0e4f70346adf75665c11276f87f7604d0bccd06753926_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/choice_widget.html.php"));

        // line 1
        echo "<?php if (\$expanded): ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_expanded') ?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'choice_widget_collapsed') ?>
<?php endif ?>
";
        
        $__internal_121b59b425058b6968b0e4f70346adf75665c11276f87f7604d0bccd06753926->leave($__internal_121b59b425058b6968b0e4f70346adf75665c11276f87f7604d0bccd06753926_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/choice_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($expanded): ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_expanded') ?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'choice_widget_collapsed') ?>*/
/* <?php endif ?>*/
/* */
