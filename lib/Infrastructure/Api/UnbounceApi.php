<?php

/**
 * Class UnbounceApi
 */
class UnbounceApi
{
    /** @var string $username */
    public $username;

    /** @var string $password */
    public $password;

    /** @var curl $handle */
    private $handle;

    /** @var string $ip */
    private $ip;

    /** @var string $url */
    private $url;

    /**
     * UnbounceApi constructor.
     */
    public function __construct()
    {
        $this->username = '72ed03289fe049d5fe6d178416c5b106';
        $this->password = '';
        $this->url = 'https://api.unbounce.com';
        $this->ip = '127.0.0.1';
    }

    /**
     * Curl
     *
     * @param string $url
     * @param null $payload
     * @param bool $post
     *
     * @return mixed
     */
    private function curl($url, $payload=null, $post=false)
    {
        $this->handle = curl_init($this->url . $url);
        curl_setopt($this->handle, CURLOPT_POST, $post);
        curl_setopt($this->handle, CURLOPT_HTTPHEADER, array('application/vnd.unbounce.api.v0.4+json'));
        curl_setopt($this->handle, CURLOPT_USERPWD, $this->username . ':' . $this->password);

        if (! is_null($payload)) {
            curl_setopt($this->handle, CURLOPT_POSTFIELDS, http_build_query($payload));
        }

        curl_setopt($this->handle, CURLOPT_RETURNTRANSFER, true);
        $return = curl_exec($this->handle);
        curl_close($this->handle);

        return $return;
    }

    /**
     * Return pages
     *
     * @return mixed[]
     */
    public function getPages()
    {
        return json_decode($this->curl('/pages'), true);
    }

    /**
     * Return leads
     *
     * @param integer $pageId
     *
     * @return mixed[]
     */
    public function getLeads($pageId)
    {
         $url = '/pages/' . $pageId . '/leads';

         return json_decode($this->curl($url), true);
    }

    /**
     * Store lead
     *
     * @param integer $pageId
     * @param mixed[] $data
     *
     * @return mixed
     */
    public function storeLead($pageId, $data)
    {
        $url = '/pages/' . $pageId . '/leads';

        $payload = array(
            'conversion' => true,
            'form_submission' => array(
                'variant_id' => 'a',
                'submitter_ip' => $this->ip,
                'form_data' => $data
            )
        );

        return $this->curl($url, $payload, true);
    }
}
