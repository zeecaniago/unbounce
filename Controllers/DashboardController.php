<?php
require_once __DIR__ . '/../lib/Application/Hydrator/PageHydrator.php';
require_once __DIR__ . '/../lib/Application/Validation/LeadValidation.php';
require_once __DIR__ . '/../lib/Presentation/Html/Browser.php';
require_once __DIR__ . '/../Models/Lead.php';
require_once __DIR__ . '/../Models/Page.php';

/**
 * Class DashboardController
 */
class DashboardController
{
    /** @var Browser $view */
    private $view;

    /** @var Lead $leadModel */
    private $leadModel;

    /** @var Page $pageModel */
    private $pageModel;

    /** @var LeadValidation $leadValidation */
    private $leadValidation;

    /** @var PageHydrator $hydrator */
    private $hydrator;

    /**
     * LeadController constructor.
     */
    public function __construct() {
        $this->view = new Browser();
        $this->leadModel = new Lead();
        $this->pageModel = new Page();
        $this->leadValidation = new LeadValidation();
        $this->hydrator = new PageHydrator();
    }

    /**
     * Return dashboard and the corresponding leads
     */
    public function index()
    {
        $responsePageApi = $this->pageModel->getPages();

        $hydratedPages = $this->hydrator->hydrate(
            $responsePageApi
        );

        $pages = array();
        foreach ($hydratedPages as $page) {
            $page['leads'] = $this->leadModel->getLeads($page['id']);
            $pages[] = $page;
        }

        $this->view->show(
            'dashboard',
            array(
                'pages' => $pages,
                'error' => $this->leadValidation->message()
            )
        );
    }

    /**
     * Store the lead
     *
     * @param mixed[] $request
     *
     * @return mixed
     */
    public function store($request)
    {
        if (!$this->leadValidation->validateAddLead($request)) {
            return false;
        }

        $pageId = $request['page'];

        $data = array(
            'email' => trim($request['email']),
            'first_name' => trim($request['first_name']),
            'last_name' => trim($request['last_name']),
        );

        return $this->leadModel->storeLead($pageId, $data);
    }
}
