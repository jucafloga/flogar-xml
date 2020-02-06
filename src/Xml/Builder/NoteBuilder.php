<?php

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\DocumentInterface;
use Flogar\Xml\Filter\TributoFunction;
use Twig\TwigFunction;

/**
 * Class NoteBuilder
 */
class NoteBuilder extends TwigBuilder implements BuilderInterface
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
     */
    public function build(DocumentInterface $document)
    {
        /**@var $document \Flogar\Model\Sale\Note */
        $prefix = $document->getTipoDoc() === '07' ? 'notacr' : 'notadb';
        $template = $prefix.$document->getUblVersion().'.xml.twig';

        return $this->render($template, $document);
    }
}