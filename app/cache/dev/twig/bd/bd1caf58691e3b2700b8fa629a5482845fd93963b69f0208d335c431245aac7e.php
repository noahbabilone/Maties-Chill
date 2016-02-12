<?php

/* @Framework/FormTable/form_row.html.php */
class __TwigTemplate_697c5c81a2d6acb65d81f77b60379e4435d97d7b72baa42f663f160874c3ad9c extends Twig_Template
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
        $__internal_438ceebf573938a9b6f440b4676fe204ea255b13f6181b852674fb88cf862da0 = $this->env->getExtension("native_profiler");
        $__internal_438ceebf573938a9b6f440b4676fe204ea255b13f6181b852674fb88cf862da0->enter($__internal_438ceebf573938a9b6f440b4676fe204ea255b13f6181b852674fb88cf862da0_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_row.html.php"));

        // line 1
        echo "<tr>
    <td>
        <?php echo \$view['form']->label(\$form) ?>
    </td>
    <td>
        <?php echo \$view['form']->errors(\$form) ?>
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_438ceebf573938a9b6f440b4676fe204ea255b13f6181b852674fb88cf862da0->leave($__internal_438ceebf573938a9b6f440b4676fe204ea255b13f6181b852674fb88cf862da0_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr>*/
/*     <td>*/
/*         <?php echo $view['form']->label($form) ?>*/
/*     </td>*/
/*     <td>*/
/*         <?php echo $view['form']->errors($form) ?>*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
