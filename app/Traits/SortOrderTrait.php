<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Model;

trait SortOrderTrait
{
    /**
     * Set the Boot
     */
    public static function bootSortOrderTrait()
    {
        // When a Model Record is Created
        static::creating(function ($model){
            $model->addSortOrder($model);
        });
    }

    /**
     * Add Sort Order to Records
     */
     protected function addSortOrder(Model $model)
     {
        $class = get_class($model);
        $maxSortOrder = $class::max('sort_order');
        $model->sort_order = $maxSortOrder ? $maxSortOrder + 1 : 1;
     }
}
