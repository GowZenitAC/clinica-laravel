<td class="border-0"><span class="badge {{ $paciente->status == 'Pendiente' ? 'badge-secondary' : ''}}
{{ $paciente->status == 'Activo' ? 'badge-info' : ''}} {{ $paciente->status == 'Alta' ? 'badge-success' : ''}} {{ $paciente->status == 'Inactivo' ? 'badge-danger' : ''}}"> {{ $paciente->status}}</span></td>