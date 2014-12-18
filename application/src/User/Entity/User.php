<?php
/**
 * Created by PhpStorm.
 * User: adamkopec
 * Date: 04.12.14
 * Time: 16:16
 */

namespace User\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Rhumsaa\Uuid\Uuid;

abstract class User {

    /** @var Uuid */
    protected $id;
    /** @var Role[] */
    protected $roles;
    /** @var  Account */
    protected $account;

    public function __construct(Uuid $id) {
        $this->id = $id;
        $this->roles = new ArrayCollection();
    }

    /**
     * @return Uuid
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @return Account
     */
    public function getAccount() {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount($account) {
        $this->account = $account;
    }

    public function hasRole(Role $role) {
        return $this->roles->containsKey($role->getCode());
    }

    public function addRole(Role $role) {
        if ($this->hasRole($role)) {
            return;
        } else {
            $this->roles->set($role->getCode(), $role);
        }
    }

    public function removeRole(Role $role) {
        $key = $role->getCode();
        if ($key) {
            $this->roles->remove($key);
        }
    }

    /**
     * @return ArrayCollection
     */
    public function getRoles() {
        return clone $this->roles;
    }
} 