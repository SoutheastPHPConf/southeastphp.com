<?php
namespace SoutheastPhp\Services;

use League\CommonMark\DocParser;
use League\CommonMark\Environment;
use League\CommonMark\HtmlRenderer;

class MarkdownService
{
    /**
     * Converts the given string of $markdown into html
     *
     * @param $markdown
     *
     * @return string
     */
    public function convertMarkdown($markdown)
    {
        $environment = Environment::createCommonMarkEnvironment();
        $parser = new DocParser($environment);
        $htmlRenderer = new HtmlRenderer($environment);
        $document = $parser->parse($markdown);

        return $htmlRenderer->renderBlock($document);
    }
}
