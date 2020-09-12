<?php
declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
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
        return $this->render('despatch.xml.twig', $document);
    }
}