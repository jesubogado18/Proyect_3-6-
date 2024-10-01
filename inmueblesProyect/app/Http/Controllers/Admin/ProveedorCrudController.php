<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ProveedorRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class ProveedorCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class ProveedorCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Proveedor::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/proveedor');
        CRUD::setEntityNameStrings('Proveedor', 'Proveedores');
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
        CRUD::column('prov_nombre')->label('Nombre');
        CRUD::column('prov_telefono')->label('Teléfono');
        CRUD::column('prov_ruc')->label('RUC');
        CRUD::column('prov_direccion')->label('Dirección');
        CRUD::column('prov_localidad')->label('Localidad');

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
        CRUD::setValidation(ProveedorRequest::class);
        CRUD::field('prov_nombre')->label('Nombre');
        CRUD::field('prov_telefono')->label('Teléfono');
        CRUD::field('prov_ruc')->label('RUC');
        CRUD::field('prov_direccion')->label('Dirección');
        CRUD::field('prov_localidad')->label('Localidad');
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
