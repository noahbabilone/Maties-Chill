<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_9a230ce6c3ef30c3e97f753de656436299434ec8f0a12aa72eaefe9049f7cceb extends Twig_Template
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
        $__internal_2f9ecd2a5f57dcec99aa70e73a242cb985049b97414ff97ada40a2f12c07d9b7 = $this->env->getExtension("native_profiler");
        $__internal_2f9ecd2a5f57dcec99aa70e73a242cb985049b97414ff97ada40a2f12c07d9b7->enter($__internal_2f9ecd2a5f57dcec99aa70e73a242cb985049b97414ff97ada40a2f12c07d9b7_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_2f9ecd2a5f57dcec99aa70e73a242cb985049b97414ff97ada40a2f12c07d9b7->leave($__internal_2f9ecd2a5f57dcec99aa70e73a242cb985049b97414ff97ada40a2f12c07d9b7_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr style="display: none">*/
/*     <td colspan="2">*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
