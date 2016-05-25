<?php
namespace DBookSecurityClient;

use DBookSecurityClient\Constants as DBCST;

class Saml2Gate extends BaseGate
{

    /**
     * Not authorized.... use ::getInstance()
     *
     * @param string  $p_broker_key
     * @param string  $p_broker_secret
     * @param string  $p_env
     * @param boolean $p_debug
     */
    protected function __construct ($p_broker_key, $p_broker_secret, $p_env, $p_debug)
    {
        $this->setDebug($p_debug);
        $this->api = new \DBookSecurityClient\Api\Client($p_broker_key, $p_broker_secret, null, $p_env);
        $this->gate = new \DBookSecurityClient\Gate\Saml2($p_broker_key, $p_broker_secret, null, $p_env);
    }

    /**
     * Get Instance
     *
     * @param string  $p_broker_key
     * @param string  $p_broker_secret
     * @param string  $p_env
     * @param boolean $p_debug
     *
     * @return \DBookSecurityClient\Saml2Gate
     */
    public static function getInstance ($p_broker_key, $p_broker_secret, $p_env = DBCST::ENV_DEV, $p_debug = false)
    {
        if (self::$_instance === false) {
            self::$_instance = new self($p_broker_key, $p_broker_secret, $p_env, $p_debug);
        }
    
        return self::$_instance;
    }
}