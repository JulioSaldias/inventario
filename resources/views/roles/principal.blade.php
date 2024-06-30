<x-app-layout>
    @section('contenido')
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Aquí se va a mostrar el rol</h1>
        </div>
    </header>
    
    <div class="container m-auto">
        <a href="{{route('role.crear')}}">
            <button class="bg-red-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-blue-500 rounded">Nuevo Registro</button>
        </a>
        <br><br>
        <table class="min-w-full border-collapse block md:table">
            <thead class="block md:table-header-group">
                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto md:relative">
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Nombre</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Descripción</th>
                    <th class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">Operaciones</th>
                </tr>
            </thead>
            <tbody class="block md:table-row-group">
                @foreach ($roles as $role)
                <tr class="bg-gray-300 border border-grey-500 md:border-none block md:table-row">
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Nombre</span>
                        <a href="{{route('role.mostrar', $role->id)}}">{{$role->nombre}}</a>
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Descripción</span>
                        {{$role->descripcion}}
                    </td>
                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                        <span class="inline-block w-1/3 md:hidden font-bold">Operaciones</span>
                        <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-green-500 rounded w-full">
                            <a href="{{route('role.mostrar', $role->id)}}">Ver</a>
                        </button>
                        <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 border border-blue-500 rounded w-full">
                            <a href="{{route('role.editar', $role)}}">Editar</a>
                        </button>
                        <form action="{{route('role.borrar', $role)}}" method="post">
                            @method('delete')
                            @csrf
                            @if($role->deleted_at)
                            <button type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-1 px-2 border border-grey-500 rounded w-full">
                                <a href="{{route('activarole', $role->id)}}">Activar</a>
                            </button>
                            <button class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full" type="submit" onclick="if(!confirm('¿Desea eliminar a: {{$role->nombre}}?')){return false;}">Borrar</button>
                            @else
                            <button type="button" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-1 px-2 border border-red-500 rounded w-full">
                                <a href="{{route('desactivarole', $role->id)}}">Desactivar</a>
                            </button>
                            @endif
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    {{$roles->links()}}
    </x-app-layout>
    