<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* display/export/options_output_format.twig */
class __TwigTemplate_df05836cd0e35db629b06c8c9774934f2f3ddbd3c3b561cabde2a4fa3fec25b1 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 1
        echo "<li>
    <label for=\"filename_template\" class=\"desc\">
        ";
        // line 3
        echo _gettext("File name template:");
        // line 4
        echo "        ";
        echo PhpMyAdmin\Util::showHint(($context["message"] ?? null));
        echo "
    </label>
    <input type=\"text\" name=\"filename_template\" id=\"filename_template\" value=\"";
        // line 7
        echo twig_escape_filter($this->env, ($context["filename_template"] ?? null), "html", null, true);
        echo "\">
    <input type=\"checkbox\" name=\"remember_template\" id=\"checkbox_remember_template\"";
        // line 9
        echo ((($context["is_checked"] ?? null)) ? (" checked") : (""));
        echo ">
    <label for=\"checkbox_remember_template\">
        ";
        // line 11
        echo _gettext("use this for future exports");
        // line 12
        echo "    </label>
</li>
";
    }

    public function getTemplateName()
    {
        return "display/export/options_output_format.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 12,  51 => 11,  46 => 9,  42 => 7,  36 => 4,  34 => 3,  30 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "display/export/options_output_format.twig", "D:\\phpstudy\\xp.cn\\www\\wwwroot\\admin\\CTFPlatform\\phpMyAdmin4.9.0.1\\templates\\display\\export\\options_output_format.twig");
    }
}
