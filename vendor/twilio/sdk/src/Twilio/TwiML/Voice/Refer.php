<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\TwiML\Voice;

use Twilio\TwiML\TwiML;

class Refer extends TwiML {
    /**
     * Refer constructor.
     *
     * @param array $attributes Optional attributes
     */
    public function __construct($attributes = array()) {
        parent::__construct('Refer', null, $attributes);
    }

    /**
     * Add Sip child.
     *
     * @param string $sipUrl SIP URL
     * @return ReferSip Child element.
     */
    public function sip($sipUrl) {
        return $this->nest(new ReferSip($sipUrl));
    }

    /**
     * Add Action attribute.
     *
     * @param string $action Action URL
     * @return static $this.
     */
    public function setAction($action) {
        return $this->setAttribute('action', $action);
    }

    /**
     * Add Method attribute.
     *
     * @param string $method Action URL method
     * @return static $this.
     */
    public function setMethod($method) {
        return $this->setAttribute('method', $method);
    }
}