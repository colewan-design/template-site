<?php
use Illuminate\Support\Facades\Schema as FacadesSchema;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;



function columnSetter($model, $request)
{
    $columns = FacadesSchema::getColumnListing($model->getTable());
    foreach ($columns as $column) {
        if (!isset($request[$column])) {
            continue;
        }
        if (is_array($request[$column])) {
            if (array_filter($request[$column])) {
                $model->{$column} = json_encode(
                    $request[$column]
                );
            }
            continue;
        }
        $model->{$column} = $request[$column];
    }
    unset($column);
}


