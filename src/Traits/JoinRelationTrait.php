<?php

namespace webelightdev\EagerJoin\Traits;

use webelightdev\EagerJoin\Services\QueryNormalizer;

trait JoinRelationTrait
{
    /**
     * Handle dynamic method calls to the relationship.
     *
     * @param  string  $method
     * @param  array   $parameters
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        $softDeleteOptions = ['withTrashed', 'withoutTrashed', 'onlyTrashed'];

        if ($method == 'where') {
            $parametersNew = QueryNormalizer::normalize($parameters);
            parent::__call('setWhereForJoin', $parametersNew);
        } elseif ($method == 'orWhere') {
            $parametersNew = QueryNormalizer::normalize($parameters);
            parent::__call('setOrWhereForJoin', $parametersNew);
        } elseif (in_array($method, $softDeleteOptions)) {
            parent::__call('setSoftDelete', [$method]);
        } else {
            $parametersInvalid = array_merge([$method], $parameters);
            parent::__call('setInvalidJoin', $parametersInvalid);
        }

        return parent::__call($method, $parameters);
    }
}
