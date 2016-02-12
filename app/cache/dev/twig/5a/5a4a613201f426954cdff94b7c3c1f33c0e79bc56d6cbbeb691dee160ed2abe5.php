<?php

/* @Framework/FormTable/form_widget_compound.html.php */
class __TwigTemplate_f2050f070ff6efaa6a33435479bd4e61f5ea5e866220f90e48408a51be45e031 extends Twig_Template
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
        $__internal_9ea9263ef1aa5f3b1f1361cd81e360b252a3976a34a9e21c21e8fbef3b5a4f8e = $this->env->getExtension("native_profiler");
        $__internal_9ea9263ef1aa5f3b1f1361cd81e360b252a3976a34a9e21c21e8fbef3b5a4f8e->enter($__internal_9ea9263ef1aa5f3b1f1361cd81e360b252a3976a34a9e21c21e8fbef3b5a4f8e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        // line 1
        echo "<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form) ?>
        </td>
    </tr>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</table>
";
        
        $__internal_9ea9263ef1aa5f3b1f1361cd81e360b252a3976a34a9e21c21e8fbef3b5a4f8e->leave($__internal_9ea9263ef1aa5f3b1f1361cd81e360b252a3976a34a9e21c21e8fbef3b5a4f8e_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <table <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <tr>*/
/*         <td colspan="2">*/
/*             <?php echo $view['form']->errors($form) ?>*/
/*         </td>*/
/*     </tr>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </table>*/
/* */
