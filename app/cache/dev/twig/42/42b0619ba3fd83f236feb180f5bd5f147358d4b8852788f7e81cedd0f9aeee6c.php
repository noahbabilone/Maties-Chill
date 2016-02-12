<?php

/* @Framework/Form/form_widget.html.php */
class __TwigTemplate_f1ffcad4a0579238e32b9645e719451460559ccbc79fd86a6f4101a5d6fa1a3f extends Twig_Template
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
        $__internal_02fc4f725305b24b73e2ac9d0d62d3fee74656dba2560e5aacbc2cea89653890 = $this->env->getExtension("native_profiler");
        $__internal_02fc4f725305b24b73e2ac9d0d62d3fee74656dba2560e5aacbc2cea89653890->enter($__internal_02fc4f725305b24b73e2ac9d0d62d3fee74656dba2560e5aacbc2cea89653890_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_widget.html.php"));

        // line 1
        echo "<?php if (\$compound): ?>
<?php echo \$view['form']->block(\$form, 'form_widget_compound')?>
<?php else: ?>
<?php echo \$view['form']->block(\$form, 'form_widget_simple')?>
<?php endif ?>
";
        
        $__internal_02fc4f725305b24b73e2ac9d0d62d3fee74656dba2560e5aacbc2cea89653890->leave($__internal_02fc4f725305b24b73e2ac9d0d62d3fee74656dba2560e5aacbc2cea89653890_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($compound): ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_compound')?>*/
/* <?php else: ?>*/
/* <?php echo $view['form']->block($form, 'form_widget_simple')?>*/
/* <?php endif ?>*/
/* */
