<div>
    <x-card cardTitle="Logs de Actividad" cardTools="Herramientas">
        <x-slot:cardTools>
            
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>ID</th>
                <th>Descripción</th>
                <th>Usuario</th>
                <th>Fecha</th>
                <th>Detalles</th>
            </x-slot:thead>

            @forelse ($logs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    <td>{{ $log->description }}</td>
                    <td>{{ optional($log->causer)->name . ' ' . optional($log->causer)->apellido_paterno ?? 'Sistema' }}</td>
                    <td>{{ $log->created_at->format('d-m-Y H:i:s') }}</td>
                    <td>
                        <a href="{{route('logs.ver', $log)}}" class="btn btn-info btn-sm" title="Ver">
                            <i class="fas fa-info-circle"></i>
                        </a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Sin registros</td>
                </tr>
            @endforelse

        </x-table>

        <x-slot:cardFooter>
            {{ $logs->links() }}
        </x-slot>
    </x-card>
</div>
