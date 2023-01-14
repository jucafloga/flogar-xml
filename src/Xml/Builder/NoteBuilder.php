<?php

declare(strict_types=1);

namespace Flogar\Xml\Builder;

use Flogar\Builder\BuilderInterface;
use Flogar\Model\DocumentInterface;
use Flogar\Model\Sale\Note;
use Flogar\Xml\Filter\TributoFunction;
use Twig\TwigFunction;

/**
 * Class NoteBuilder.
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
     *
     * @return string
     */
    public function build(DocumentInterface $document): string
    {
        /** @var Note $note */
        $note = /*.(Note).*/$document;
        $prefix = $note->getTipoDoc() === '07' ? 'notacr' : 'notadb';
        $template = $prefix.$note->getUblVersion().'.xml.twig';

        return $this->render($template, $document);
    }
}
