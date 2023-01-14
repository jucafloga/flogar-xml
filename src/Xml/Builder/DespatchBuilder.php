<?php

declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\Despatch\Despatch;
use Flogar\Model\DocumentInterface;

/**
 * Class DespatchBuilder
 * @package Flogar\Xml\Builder
 */
class DespatchBuilder extends TwigBuilder implements BuilderInterface
{
    /**
     * Create xml for document.
     *
     * @param DocumentInterface $document
     * @return string
     */
    public function build(DocumentInterface $document): ?string
    {
        /** @var Despatch $despatch */
        $despatch = $document;
        $template = $despatch->getVersion() === '2022' ? 'despatch2022.xml.twig': 'despatch.xml.twig';

        return $this->render($template, $document);
    }
}