<?php

namespace DC\Bundler\CSSMin;

class CSSMinTransformer implements \DC\Bundler\ITransformer {
    /**
     * @var array
     */
    private $filters;
    /**
     * @var array
     */
    private $plugins;

    function __construct($filters = [], $plugins = [])
    {
        $this->filters = $filters;
        $this->plugins = $plugins;
    }


    /**
     * @inheritdoc
     */
    function getName()
    {
        return "cssmin";
    }

    /**
     * @inheritdoc
     */
    function transform(\DC\Bundler\Content $content, $file = null)
    {
        return new \DC\Bundler\Content($this->getOutputContentType(), \CssMin::minify($content->getContent(), $this->filters, $this->plugins));
    }

    /**
     * @inheritdoc
     */
    function getOutputContentType()
    {
        return "text/css";
    }

    /**
     * @inheritdoc
     */
    function runInDebugMode()
    {
        return false;
    }

    public static function registerWithContainer(\DC\IoC\Container $container, $filters = [], $plugins = []) {
        $container
            ->register(function() use ($filters, $plugins) {
                return new \DC\Bundler\CSSMin($filters, $plugins);
            })
            ->to('\DC\Bundler\ITransformer');
    }
}