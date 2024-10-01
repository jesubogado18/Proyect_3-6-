<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PisoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class PisoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class PisoCrudController extends CrudController
{
    use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
    use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

    /**
     * Configure the CrudPanel object. Apply settings to all operations.
     * 
     * @return void
     */
    public function setup()
    {
        CRUD::setModel(\App\Models\Piso::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/piso');
        CRUD::setEntityNameStrings('piso', 'pisos');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        CRUD::column('row_number')->type('row_number')->label('#')->orderable(false);
        CRUD::column('piso_descripcion')->label('Descripción');
        CRUD::column('piso_direccion')->label('Dirección');
        CRUD::column('edificio')->attribute('edif_descripcion')->linkTo('edificio.show');


    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(PisoRequest::class);
        CRUD::field('piso_descripcion')->label('Descripción');
        CRUD::field('piso_direccion')->label('Dirección')->type('textarea');
        CRUD::field([
            'label' => 'Edificio',
            'name' => 'edif_id',
            'entity' => 'edificio',
            'type' => 'select',
            'attribute' => 'edif_descripcion',
            'model' => 'App\Models\Edificio'
        ]);

        /**
         * Fields can be defined using the fluent syntax:
         * - CRUD::field('price')->type('number');
         */
    }

    /**
     * Define what happens when the Update operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
