<div>
    <h1>Componente inicio</h1>    
    <x-card cardTitle="titulo del card" cardTools="cardTooooools" cardFooter="cardfoooter">
        <x-slot:cardTools>
            <a href="#" class="btn btn-primary">Crear</a>
        </x-slot:cardTools>

        <x-table>
            <x-slot:thead>
                <th>Nombre</th>
                <th>Descripcion</th>

            </x-slot>
                <tr>
                    <td>...</td>
                    <td>...</td>
                </tr>
            
        </x-table>
    </x-card>
</div>
