<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pract_nav extends Model
{
    protected $fillable = ['id', 'pract_name', 'napr_id','kafedra_id'];
 

/**
     * The Model instance.
     *
     * @var \Illuminate\Database\Eloquent\Model
     */
   
   /**
     * Create a query for Product.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function funcSelect($id)
    {
        $query = Pract_nav::select('id', 'pract_name')
            ->where('napr_id', $id);
            //->where('top9', 1);
            //->orderBy('price', 'asc');
                           
           return $query->get();
    }
}