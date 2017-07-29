<?php
require_once __DIR__ . '/../lib/Infrastructure/Api/UnbounceApi.php';

/**
 * Class Page
 */
class Page
{
    /** @var UnbounceApi $unbounceApi */
    private $unbounceApi;

    /**
     * Page constructor.
     */
    public function __construct()
    {
        $this->unbounceApi = new UnbounceApi();
    }

    /**
     * Return pages
     *
     * @return mixed[]
     */
    public function getPages()
    {
        return $this->unbounceApi->getPages();
    }
}
