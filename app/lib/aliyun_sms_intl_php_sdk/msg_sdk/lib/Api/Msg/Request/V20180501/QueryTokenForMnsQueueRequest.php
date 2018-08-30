<?php

namespace Aliyun\Api\Msg\Request\V20180501;
use Aliyun\Core\RpcAcsRequest;

class QueryTokenForMnsQueueRequest extends RpcAcsRequest
{
    function  __construct()
    {
        parent::__construct("Dybaseapi", "2018-05-01", "QueryTokenForMnsQueue");
        $this->setMethod("POST");
    }

    private  $queueName;

    private  $resourceOwnerId;

    private  $resourceOwnerAccount;

    private  $messageType;

    private  $ownerId;

    public function getQueueName() {
        return $this->queueName;
    }

    public function setQueueName($queueName) {
        $this->queueName = $queueName;
        $this->queryParameters["QueueName"]=$queueName;
    }

    public function getResourceOwnerId() {
        return $this->resourceOwnerId;
    }

    public function setResourceOwnerId($resourceOwnerId) {
        $this->resourceOwnerId = $resourceOwnerId;
        $this->queryParameters["ResourceOwnerId"]=$resourceOwnerId;
    }

    public function getResourceOwnerAccount() {
        return $this->resourceOwnerAccount;
    }

    public function setResourceOwnerAccount($resourceOwnerAccount) {
        $this->resourceOwnerAccount = $resourceOwnerAccount;
        $this->queryParameters["ResourceOwnerAccount"]=$resourceOwnerAccount;
    }

    public function getMessageType() {
        return $this->messageType;
    }

    public function setMessageType($messageType) {
        $this->messageType = $messageType;
        $this->queryParameters["MessageType"]=$messageType;
    }

    public function getOwnerId() {
        return $this->ownerId;
    }

    public function setOwnerId($ownerId) {
        $this->ownerId = $ownerId;
        $this->queryParameters["OwnerId"]=$ownerId;
    }

}