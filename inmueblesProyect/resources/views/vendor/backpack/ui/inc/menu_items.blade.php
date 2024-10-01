<li class="nav-item">
    <a class="nav-link" href="{{ backpack_url('dashboard') }}">
        <i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}
    </a>
</li>

<x-backpack::menu-item title="Usuarios" icon="la la-user" :link="backpack_url('user')" />
<x-backpack::menu-item title="Edificios" icon="la la-university" :link="backpack_url('edificio')" />
<x-backpack::menu-item title="Pisos" icon="la la-building" :link="backpack_url('piso')" />
<x-backpack::menu-item title="Sectores" icon="la la-th-large" :link="backpack_url('sector')" />
<x-backpack::menu-item title="Proveedores" icon="la la-truck" :link="backpack_url('proveedor')" />
<x-backpack::menu-item title="Tipos de salas" icon="la la-door-open" :link="backpack_url('sala-tipo')" />
<x-backpack::menu-item title="Subtipo de bienes" icon="la la-briefcase" :link="backpack_url('bienessubtipo')" />
<x-backpack::menu-item title="Tipo de bienes" icon="la la-box" :link="backpack_url('tipo-bien')" />
<x-backpack::menu-item title="Dependencias" icon="la la-list" :link="backpack_url('dependencia')" />
<x-backpack::menu-item title="Salas" icon="la la-question" :link="backpack_url('sala')" />

