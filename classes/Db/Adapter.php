<?php

/**
 * Generated Model class.
 */
class Db_Adapter extends Zend_Db_Adapter_Pdo_Mysql
{

    /**
     * Gets the instance of AdminLockPeer
     * 
     * @return AdminLockPeer
     */
    public function getAdminLockPeer()
    {
        return AdminLockPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionPeer
     * 
     * @return AdminSectionPeer
     */
    public function getAdminSectionPeer()
    {
        return AdminSectionPeer::getInstance();
    }

    /**
     * Gets the instance of AdminUserPeer
     * 
     * @return AdminUserPeer
     */
    public function getAdminUserPeer()
    {
        return AdminUserPeer::getInstance();
    }

    /**
     * Gets the instance of AdminLogPeer
     * 
     * @return AdminLogPeer
     */
    public function getAdminLogPeer()
    {
        return AdminLogPeer::getInstance();
    }

    /**
     * Gets the instance of AdminRolePeer
     * 
     * @return AdminRolePeer
     */
    public function getAdminRolePeer()
    {
        return AdminRolePeer::getInstance();
    }

    /**
     * Gets the instance of AdminRole2sectionPeer
     * 
     * @return AdminRole2sectionPeer
     */
    public function getAdminRole2sectionPeer()
    {
        return AdminRole2sectionPeer::getInstance();
    }

    /**
     * Gets the instance of AdminRole2sectionGroupPeer
     * 
     * @return AdminRole2sectionGroupPeer
     */
    public function getAdminRole2sectionGroupPeer()
    {
        return AdminRole2sectionGroupPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionGroupPeer
     * 
     * @return AdminSectionGroupPeer
     */
    public function getAdminSectionGroupPeer()
    {
        return AdminSectionGroupPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionHandlerPeer
     * 
     * @return AdminSectionHandlerPeer
     */
    public function getAdminSectionHandlerPeer()
    {
        return AdminSectionHandlerPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionPropertyPeer
     * 
     * @return AdminSectionPropertyPeer
     */
    public function getAdminSectionPropertyPeer()
    {
        return AdminSectionPropertyPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionPropertyFilterPeer
     * 
     * @return AdminSectionPropertyFilterPeer
     */
    public function getAdminSectionPropertyFilterPeer()
    {
        return AdminSectionPropertyFilterPeer::getInstance();
    }

    /**
     * Gets the instance of AdminSectionPropertyValidatorPeer
     * 
     * @return AdminSectionPropertyValidatorPeer
     */
    public function getAdminSectionPropertyValidatorPeer()
    {
        return AdminSectionPropertyValidatorPeer::getInstance();
    }

    /**
     * Gets the instance of FaqPeer
     * 
     * @return FaqPeer
     */
    public function getFaqPeer()
    {
        return FaqPeer::getInstance();
    }

    /**
     * Gets the instance of MidletPeer
     * 
     * @return MidletPeer
     */
    public function getMidletPeer()
    {
        return MidletPeer::getInstance();
    }

    /**
     * Gets the instance of MidletTypePeer
     * 
     * @return MidletTypePeer
     */
    public function getMidletTypePeer()
    {
        return MidletTypePeer::getInstance();
    }

    /**
     * Gets the instance of ProfilePeer
     * 
     * @return ProfilePeer
     */
    public function getProfilePeer()
    {
        return ProfilePeer::getInstance();
    }

    /**
     * Gets the instance of SmsNumberPeer
     * 
     * @return SmsNumberPeer
     */
    public function getSmsNumberPeer()
    {
        return SmsNumberPeer::getInstance();
    }

    /**
     * Gets the instance of Midlet2subaccPeer
     * 
     * @return Midlet2subaccPeer
     */
    public function getMidlet2subaccPeer()
    {
        return Midlet2subaccPeer::getInstance();
    }

    /**
     * Gets the instance of SubaccPeer
     * 
     * @return SubaccPeer
     */
    public function getSubaccPeer()
    {
        return SubaccPeer::getInstance();
    }

    /**
     * Gets the instance of NewsPeer
     * 
     * @return NewsPeer
     */
    public function getNewsPeer()
    {
        return NewsPeer::getInstance();
    }

    /**
     * Gets the instance of PaymentStatusPeer
     * 
     * @return PaymentStatusPeer
     */
    public function getPaymentStatusPeer()
    {
        return PaymentStatusPeer::getInstance();
    }

    /**
     * Gets the instance of ProfileWalletPeer
     * 
     * @return ProfileWalletPeer
     */
    public function getProfileWalletPeer()
    {
        return ProfileWalletPeer::getInstance();
    }

    /**
     * Gets the instance of ProfilePaymentPeer
     * 
     * @return ProfilePaymentPeer
     */
    public function getProfilePaymentPeer()
    {
        return ProfilePaymentPeer::getInstance();
    }

    /**
     * Gets the instance of SmsBillingPeer
     * 
     * @return SmsBillingPeer
     */
    public function getSmsBillingPeer()
    {
        return SmsBillingPeer::getInstance();
    }

    /**
     * Gets the instance of StatisticDownloadPeer
     * 
     * @return StatisticDownloadPeer
     */
    public function getStatisticDownloadPeer()
    {
        return StatisticDownloadPeer::getInstance();
    }

    /**
     * Gets the instance of StatisticSmsPeer
     * 
     * @return StatisticSmsPeer
     */
    public function getStatisticSmsPeer()
    {
        return StatisticSmsPeer::getInstance();
    }

    /**
     * Gets the instance of TicketPeer
     * 
     * @return TicketPeer
     */
    public function getTicketPeer()
    {
        return TicketPeer::getInstance();
    }

    /**
     * Gets the instance of TicketStatusPeer
     * 
     * @return TicketStatusPeer
     */
    public function getTicketStatusPeer()
    {
        return TicketStatusPeer::getInstance();
    }

    /**
     * Gets the instance of TicketMessagePeer
     * 
     * @return TicketMessagePeer
     */
    public function getTicketMessagePeer()
    {
        return TicketMessagePeer::getInstance();
    }


}

