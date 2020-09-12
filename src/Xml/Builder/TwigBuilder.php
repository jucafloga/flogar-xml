<?php
declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Xml\Filter\FormatFilter;
use Twig\Environment;
use Twig\Extension\CoreExtension;
use Twig\Loader\FilesystemLoader;
use Twig\TwigFilter;

/**
 * Class TwigBuilder.
 */
class TwigBuilder
{
    /**
     * Zona horaria para fechas en XML.
     */
    public const TIMEZONE = 'America/Lima';

    /**
     * @var Environment
     */
    protected $twig;

    /**
     * TwigBuilder constructor.
     *
     * @param array $options [optional] Recommended: 'cache' => '/dir/cache'
     */
    public function __construct(array $options = [])
    {
        $this->initTwig($options);
    }

    /**
     * Get Content XML from template.
     *
     * @param string $template
     * @param object $doc
     *
     * @return string
     */
    public function render($template, $doc): string
    {
        return $this->twig->render($template, [
            'doc' => $doc,
        ]);
    }

    private function initTwig($options)
    {
        $loader = new FilesystemLoader(__DIR__.'/../Templates');

        $twig = new Environment($loader, $options);
        $this->loadFilterAndFunctions($twig);
        $this->configureTimezone($twig);

        $this->twig = $twig;
    }

    private function configureTimezone(Environment $twig)
    {
        $extension = $twig->getExtension(CoreExtension::class);
        if ($extension instanceof CoreExtension) {
            $extension->setTimezone(self::TIMEZONE);
        }
    }

    /**
     * @param Environment $twig
     */
    private function loadFilterAndFunctions(Environment $twig)
    {
        $formatFilter = new FormatFilter();

        $twig->addFilter(new TwigFilter('n_format', [$formatFilter, 'number']));
        $twig->addFilter(new TwigFilter('n_format_limit', [$formatFilter, 'numberLimit']));
    }
}
