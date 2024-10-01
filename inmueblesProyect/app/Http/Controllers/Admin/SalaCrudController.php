<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\SalaRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class SalaCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class SalaCrudController extends CrudController
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
        CRUD::setModel(\App\Models\Sala::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/sala');
        CRUD::setEntityNameStrings('Sala', 'Salas');
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
        CRUD::column('sector')->attribute('sect_descripcion')->linkTo('sector.show');
        CRUD::column('salaTipo')->attribute('stip_descripcion')->label('Tipo de sala')->linkTo('sala-tipo.show');
        CRUD::column('dependencia')->attribute('depe_descripcion')->linkTo('dependencia.show');
        CRUD::column('sala_descripcion')->label('Descripción');
        CRUD::column('sala_direccion')->label('Dirección');
        CRUD::column('sala_capacidad')->label('Capacidad');
    }

    /**
     * Define what happens when the Create operation is loaded.
     * 
     * @see https://backpackforlaravel.com/docs/crud-operation-create
     * @return void
     */
    protected function setupCreateOperation()
    {
        CRUD::setValidation(SalaRequest::class);

        CRUD::field([
            'label' => 'Sectores',
            'name' => 'sect_id',
            'entity' => 'sector',
            'type' => 'select',
            'attribute' => 'sect_descripcion', // Asegúrate de que este campo exista en el modelo Sector
            'model' => 'App\Models\Sector'
        ]);

        CRUD::field([
            'label' => 'Tipo de sala',
            'name' => 'stip_id',
            'entity' => 'salaTipo',
            'type' => 'select',
            'attribute' => 'stip_descripcion',
            'model' => 'App\Models\SalaTipo'
        ]);

        CRUD::field([
            'label' => 'Dependencia',
            'name' => 'depe_id',
            'entity' => 'dependencia',
            'type' => 'select',
            'attribute' => 'depe_descripcion',
            'model' => 'App\Models\Dependencia'
        ]);

        CRUD::field('sala_descripcion')->label('Descripción');
        CRUD::field('sala_direccion')->label('Dirección');
        CRUD::field('sala_capacidad')->label('Capacidad');
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
