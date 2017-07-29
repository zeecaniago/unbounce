<?php

/**
 * Class PageHydrator
 */
class PageHydrator
{
    /**
     * Hydrate page response from Api
     *
     * @param mixed[] $responsePageApi
     *
     * @return array
     */
    public function hydrate($responsePageApi)
    {
        $pages = array();
        foreach ($responsePageApi['pages'] as $page) {
            $pages[$page['id']] = $page;
        }

        return $pages;
    }
}
