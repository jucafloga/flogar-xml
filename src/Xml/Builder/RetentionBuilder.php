<?php

declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\DocumentInterface;

/**
 * Class RetentionBuilder
 * @package Flogar\Xml\Builder
 */
class RetentionBuilder extends TwigBuilder implements BuilderInterface
{

    /**
     * Create xml for document.
     *
     * @param DocumentInterface $document
     * @return string
     */
    public function build(DocumentInterface $document): ?string
    {
        return $this->render('retention.xml.twig', $document);
    }
}