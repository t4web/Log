<?php

namespace T4web\Log\Action\Backend\ListAction;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\Input;
use T4web\Crud\Validator\BaseFilter;

class CriteriaValidator extends BaseFilter
{
    public function __construct()
    {
        $this->inputFilter = new InputFilter();

        $id = new Input('id_equalTo');
        $id->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $id->setRequired(false);

        $message = new Input('message_like');
        $message->getFilterChain()
            ->attachByName('StringTrim');
        $message->getValidatorChain()
            ->attachByName('StringLength', ['min' => 0, 'max' => 50]);
        $message->setRequired(false);

        $scope = new Input('scope_equalTo');
        $scope->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0, 'max' => 1]);
        $scope->setRequired(false);

        $priority = new Input('priority_equalTo');
        $priority->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0, 'max' => 7]);
        $priority->setRequired(false);

        $limit = new Input('limit');
        $limit->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $limit->setRequired(false);

        $page = new Input('page');
        $page->getValidatorChain()
            ->attachByName('Digits')
            ->attachByName('GreaterThan', ['min' => 0]);
        $page->setRequired(false);

        $createdDtLessThen = new Input('createdDt_lessThan');
        $createdDtLessThen->setRequired(false);

        $createdDtGreaterThan = new Input('createdDt_greaterThan');
        $createdDtGreaterThan->setRequired(false);

        $this->inputFilter->add($id);
        $this->inputFilter->add($message);
        $this->inputFilter->add($scope);
        $this->inputFilter->add($priority);
        $this->inputFilter->add($limit);
        $this->inputFilter->add($page);
        $this->inputFilter->add($createdDtLessThen);
        $this->inputFilter->add($createdDtGreaterThan);
    }
}