<?php

/* @Framework/Form/datetime_widget.html.php */
class __TwigTemplate_76d4352b9b653323e046312d0768c9432f249bb7049bd763b4b5a5a13f95353e extends Twig_Template
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
        $__internal_3c72cff6cfeb7a8f7cf80a65005dfa77497f3c9ea3454e2c69066daccffbb609 = $this->env->getExtension("native_profiler");
        $__internal_3c72cff6cfeb7a8f7cf80a65005dfa77497f3c9ea3454e2c69066daccffbb609->enter($__internal_3c72cff6cfeb7a8f7cf80a65005dfa77497f3c9ea3454e2c69066daccffbb609_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/datetime_widget.html.php"));

        // line 1
        echo "<?php if (\$widget == 'single_text'): ?>
    <?php echo \$view['form']->block(\$form, 'form_widget_simple'); ?>
<?php else: ?>
    <div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
        <?php echo \$view['form']->widget(\$form['date']).' '.\$view['form']->widget(\$form['time']) ?>
    </div>
<?php endif ?>
";
        
        $__internal_3c72cff6cfeb7a8f7cf80a65005dfa77497f3c9ea3454e2c69066daccffbb609->leave($__internal_3c72cff6cfeb7a8f7cf80a65005dfa77497f3c9ea3454e2c69066daccffbb609_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/datetime_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($widget == 'single_text'): ?>*/
/*     <?php echo $view['form']->block($form, 'form_widget_simple'); ?>*/
/* <?php else: ?>*/
/*     <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*         <?php echo $view['form']->widget($form['date']).' '.$view['form']->widget($form['time']) ?>*/
/*     </div>*/
/* <?php endif ?>*/
/* */
