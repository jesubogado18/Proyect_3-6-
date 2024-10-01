<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SectorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SectorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SectorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Sector::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sector');
        CRUD::setEntityNameStrings('Sector', 'Sectores');
    }

    /**
     * Define what happens when the List operation is loaded.
     * 
     * @see  https://backpackforlaravel.com/docs/crud-operation-list-entries
     * @return void
     */
    protected function setupListOperation()
    {
        

        CRUD::column('row_number')->type('row_number')->label('id')->orderable(false);
        CRUD::column('sect_descripcion')->label('Descripción');
        CRUD::column('sect_direccion')->label('Dirección');
        CRUD::column('piso')->attribute('piso_descripcion')->linkTo('piso.show');

        /**
         * Columns can be defined using the fluent syntax:
         * - CRUD::column('price')->type('number');
         */
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SectorRequest::class);
        CRUD::setFromDb(); // set fields from db columns.
        CRUD::addField([
            'name' => 'piso_id',
            'label' => 'Piso',
            'type' => 'select',
            'entity' => 'piso', // El nombre de la relación en el modelo Sector
            'attribute' => 'piso_descripcion', // El campo que se mostrará (la descripción)
            'model' => "App\Models\Piso", // El modelo relacionado
            'options'   => (function ($query) {
                return $query->orderBy('piso_descripcion', 'ASC')->get();
            }), // Opciones ordenadas por descripción
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
