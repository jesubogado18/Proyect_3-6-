<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TipoBienRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TipoBienCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TipoBienCrudController extends CrudController
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
        CRUD::setModel(\App\Models\TipoBien::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tipo-bien');
        CRUD::setEntityNameStrings('Tipo de bien', 'Tipos de bienes');
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
        CRUD::column('btip_descripcion')->label('Descripción');
        CRUD::column('btip_detalle')->label('Detalle'); 
        CRUD::column('btip_costo')->label('Costo');
        CRUD::column('BienesSubTipo.bsti_descripcion')->label('Subtipo');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(TipoBienRequest::class);
        CRUD::field('btip_descripcion')->label('Descripción');
        CRUD::field('btip_detalle')->label('Detalle');
        CRUD::field('btip_costo')->label('Costo');
        CRUD::field([
            'label' => 'Bienes Subtipo',
            'name' => 'bsti_id',
            'entity' => 'BienesSubTipo',
            'type' => 'select',
            'attribute' => 'bsti_detalles',
            'model' => 'App\Models\BienesSubTipo'
        ]);
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
