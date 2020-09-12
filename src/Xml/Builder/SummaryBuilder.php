<?php
declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\DocumentInterface;

/**
 * Class SummaryBuilder
 * @package Flogar\Xml\Builder
 */
class SummaryBuilder extends TwigBuilder implements BuilderInterface
{

    /**
     * Create xml for document.
     *
     * @param DocumentInterface $document
     * @return string
     */
    public function build(DocumentInterface $document): ?string
    {
        return $this->render('summary.xml.twig', $document);
    }
}