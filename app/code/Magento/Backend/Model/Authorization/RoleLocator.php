<?php
/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Backend\Model\Authorization;

class RoleLocator implements \Magento\Framework\Authorization\RoleLocatorInterface
{
    /**
     * Authentication service
     *
     * @var \Magento\Backend\Model\Auth\Session\Proxy
     */
    protected $_session;

    /**
     * @param \Magento\Backend\Model\Auth\Session\Proxy $session
     */
    public function __construct(\Magento\Backend\Model\Auth\Session\Proxy $session)
    {
        $this->_session = $session;
    }

    /**
     * Retrieve current role
     *
     * @return string|null
     */
    public function getAclRoleId()
    {
        if ($this->_session->hasUser()) {
            return $this->_session->getUser()->getAclRole();
        }
        return null;
    }
}
