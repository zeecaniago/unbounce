<?php

/**
 * Class LeadValidation
 */
class LeadValidation
{
    /** @var string $errorMessage */
    private $errorMessage;

    /**
     * LeadValidation constructor.
     */
    public function __construct()
    {
        $this->errorMessage = '';
    }

    /**
     * Validate add lead
     *
     * @param mixed[] $request
     *
     * @return bool
     */
    public function validateAddLead($request)
    {
        if (!isset($request['first_name']) || $this->validateString($request['first_name'])) {
            $this->errorMessage = 'Invalid first name';
            return false;
        }

        if (!isset($request['last_name']) || $this->validateString($request['last_name'])) {
            $this->errorMessage = 'Invalid last name';
            return false;
        }

        if (!isset($request['email']) || !filter_var($request['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errorMessage = 'Invalid email';
            return false;
        }

        return true;
    }

    /**
     * Validate string
     *
     * @param string $string
     *
     * @return bool
     */
    private function validateString($string)
    {
        return (empty($string) || preg_match('/[^a-zA-Z0-9_-]/', $string));
    }

    /**
     * Get the error message
     *
     * @return string
     */
    public function message()
    {
        return $this->errorMessage;
    }
}
