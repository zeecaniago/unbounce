<?php
require_once __DIR__ . '/../lib/Infrastructure/Api/UnbounceApi.php';

/**
 * Class Lead
 */
class Lead
{
    /** @var UnbounceApi $unbounceApi */
    private $unbounceApi;

    /**
     * Lead constructor.
     */
    public function __construct()
    {
        $this->unbounceApi = new UnbounceApi();
    }

    /**
     * Get Leads
     *
     * @param integer $pageId
     *
     * @return mixed[]
     */
    public function getLeads($pageId)
    {
        return $this->unbounceApi->getLeads($pageId);
    }

    /**
     * Store lead
     *
     * @param integer $pageId
     * @param mixed[] $lead
     */
    public function storeLead($pageId, $lead)
    {
        return $this->unbounceApi->storeLead($pageId, $lead);
    }
}
