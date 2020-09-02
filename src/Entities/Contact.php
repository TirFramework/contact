<?php

namespace Tir\Contact\Entities;

use Tir\Crud\Support\Eloquent\CrudModel;
use Cviebrock\EloquentSluggable\Sluggable;
use Tir\Crud\Support\Eloquent\Translatable;

class Contact extends CrudModel
{

    use Translatable, Sluggable;

    /**
     * The attribute show route name
     * and we use in fieldTypes and controllers
     *
     * @var string
     */
    public static $routeName = 'contact';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'name', 'lastname', 'type', 'email', 'phone', 'subject', 'file', 'description', 'visti_at', ];


    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'slug'
            ]
        ];
    }

    /**
     * This function return array for validation
     *
     * @return array
     */
    public function getValidation()
    {
        return [
            'name'   => 'required',
            'email'    => 'required',
        ];
    }


    /**
     * This function return an object of field
     * and we use this for generate admin panel page
     * @return array
     */
    public function getFields()
    {
        return [
            [
                'name'    => 'basic_information',
                'type'    => 'group',
                'visible' => 'ce',
                'tabs'    => [
                    [
                        'name'    => 'post_information',
                        'type'    => 'tab',
                        'visible' => 'ce',
                        'fields'  => [
                            [
                                'name'       =>'id',
                                'type'       =>'text',
                                'visible'    =>'i',
                            ],
                            [
                                'name'       =>'name',
                                'type'       =>'text',
                                'option'     =>'readonly',
                                'visible'    =>'ce',
                            ],
                            [
                                'name'       =>'type',
                                'type'       =>'text',
                                'option'     =>'readonly',
                                'visible'    =>'ice',
                            ],
                            [
                                'name'       =>'email',
                                'type'       =>'text',
                                'option'     =>'readonly',
                                'visible'    =>'ice',
                            ],
                            [
                                'name'       =>'created_at',
                                'type'       =>'text',
                                'option'     =>'readonly',
                                'visible'    =>'ieo',
                            ],
                            [
                                'name'      =>'description',
                                'type'      =>'textarea',
                                'option'     =>'readonly',
                                'visible'   =>'ce'
                            ],

                        ]
                    ],
                ]
            ]
        ];
    }

    //

    //Additional methods //////////////////////////////////////////////////////////////////////////////////////////////


    //Relations methods ///////////////////////////////////////////////////////////////////////////////////////////////

}
