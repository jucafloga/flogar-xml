<?php

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\DocumentInterface;
use Flogar\Model\Sale\Invoice;
use Flogar\Xml\Filter\TributoFunction;
use Twig\TwigFunction;

/**
 * Class InvoiceBuilder
 */
class InvoiceBuilder extends TwigBuilder implements BuilderInterface
{
    /**
     * @param array $options
     */
    public function __construct($options = [])
    {
        parent::__construct($options);
        $this->twig->addFunction(new TwigFunction('getTributoAfect', [TributoFunction::class, 'getByAfectacion']));
    }
    
    /**
     * Create xml for document.
     *
     * @param DocumentInterface $document
     * @return string
     * @throws \Exception
     */
    public function build(DocumentInterface $document)
    {
        /**@var $document Invoice */
        $template = 'invoice'.$document->getUblVersion().'.xml.twig';

        return $this->render($template, $document);
    }
}