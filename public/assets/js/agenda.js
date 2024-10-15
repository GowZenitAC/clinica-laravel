const URL = 'http://127.0.0.1:8000/agenda';
let calendar;
let title,
    nombre_paciente,
    start,
    end,
    id_paciente,
    namePaciente,
    id_cita,
    pacientes = [];
const originalSelectPacienteHTML = document.querySelector('#selectPaciente').outerHTML;
const checkPac = document.querySelector('#checkPaciente');

document.addEventListener('DOMContentLoaded', function() {
    getPacientes(); 
    $('#selectPaciente').selectize({
        create: true,
        onChange: function(value) {
            id_paciente = value
        }
    })
    let calendarEl = document.getElementById('calendar');
     calendar = new FullCalendar.Calendar(calendarEl, {
      initialView: 'timeGridWeek',
      locale: 'es',
       buttonText: {
        today: 'Hoy',
        month: 'Mes',
        week: 'Semana',
        day: 'Día',
        list: 'Lista'
    },
      headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      events: 'http://127.0.0.1:8000/agenda',
      eventColor: 'blue', 
      dateClick: function(info) {
        showModal(info);
      },
      eventClick: function(info) {
        id_cita = info.event.id;
        console.log(info.event);
        showModalEdit(info.event);
      }
    });
    calendar.render();
    
  });
  const getPacientes = async (id) => {
    const url = 'http://127.0.0.1:8000/pacFind'
    const response = await axios.get(url);
    
 pacientes = response.data;
    
    console.log(pacientes);
}
  const showModal = (data, type) => {
  formatDateHour(data.dateStr);
  $('#myModal').modal('show');
}
const showModalEdit = (data) => {
  namePaciente = pacientes.find(item => item.id === data.extendedProps.id_paciente)?.nombre ?? data.extendedProps.nombre_paciente; //using nullish coalescing ?? (check if null or undefined)
    // namePaciente = ? pacientes.find(item => item.id === data.extendedProps.id_paciente).nombre : data.extendedProps.nombre_paciente; 

    id_paciente = data.extendedProps.id_paciente;
    $('#pacienteInputEditar').val(namePaciente);
    $('#titleInputEditar').val(data.title);
    const dateForm = moment(data.start)
    const timeForm = moment(data.start)
    const inputDate = document.querySelector('#fechaInputEditar');
    inputDate.value = dateForm.format('YYYY-MM-DD');
    const inputTime = document.querySelector('#horaInputEditar');
    inputTime.value = timeForm.format('HH:mm');
    $('#modalEdit').modal('show');
}

const formatDateHour = (date) => {
    const dateForm = moment(date).format('DD/MM/YYYY'),
          timeForm = moment(date).format('HH:mm a');
          
    $('#fecha').text(dateForm);
    $('#horario').text(timeForm);
    
    start = date;
}

const saveCita = () => {
  title =  $('#pacienteInput').val();
  nombre_paciente =  $('#pacienteInput2').val();
    const data = {
        'title': title,
        'start': start,
        'end': end ? end : '',
        'id_paciente': id_paciente ? parseInt(id_paciente) : '',
        'nombre_paciente': nombre_paciente ? nombre_paciente : '',
    }
    console.log(data);
    axios.post(URL, data).then((response) => {
        console.log(response);
        $('#myModal').modal('hide');
        $('#pacienteInput').val('');
        $('#selectPaciente').selectize()[0].selectize.clear();
        $('#pacienteInput2').val('');
        calendar.refetchEvents();
    }).catch((error) => {
        console.log(error);
    })
}

const editCita = () => {
   const f = $('#fechaInputEditar').val();
   const h = $('#horaInputEditar').val();
   const title =  $('#titleInputEditar').val();
   const start = moment(`${f}${h}`, 'YYYY-MM-DD HH:mm').format('YYYY-MM-DDTHH:mm:ssZ');
    const data = {
        'id': parseInt(id_cita),
        'title': title,
        'start': start,
        'id_paciente': parseInt(id_paciente),
    }
    console.log(data);
    axios.put(URL + '/' + data.id, data).then((response) => {
        console.log(response);
        $('#modalEdit').modal('hide');
        $('#titleInputEditar').val('');
        id_cita = '';
        id_paciente = '';
        namePaciente = '';
        calendar.refetchEvents();
    }).catch((error) => {
        console.log(error);
    })
}
$('#deleteCita').on('click', function(e) {
    e.preventDefault();
    swal({
        title: "¿Deseas eliminar esta Cita?",
        text: "Esto no se podrá revertir",
        icon: "warning",
        buttons: {
          confirm: {
            text: "Si, Eliminar",
            className: "btn btn-success",
          },
          cancel: {
            visible: true,
            className: "btn btn-danger",
          },
        },
      }).then((Delete) => {
        if (Delete) {
          deleteCita();
        } else {
          swal.close();
        }
      });
})
const deleteCita = () => {
    axios.delete(URL + '/' + id_cita).then((response) => {
        console.log(response);
        $('#modaEdit').modal('hide');
        calendar.refetchEvents();
    }).catch((error) => {
        console.log(error);
    })
}

const insertForm = () => {
    id_paciente = '';
    $('#selectPaciente').selectize()[0].selectize.destroy();
    $('#selectPaciente').replaceWith('<input type="text" class="form-control" id="pacienteInput2" name="paciente" placeholder="Ingrese el nombre del paciente">');
}

const restoreSelect = () => {
  nombre_paciente = '';
  const pacienteInput = document.querySelector('#pacienteInput2');
  pacienteInput.outerHTML = originalSelectPacienteHTML;
  $('#selectPaciente').selectize({
      create: true,
      onChange: function(value) {
          id_paciente = value;
          console.log(id_paciente);
      }
  });  // Reactivamos selectize en el select restaurado
}

checkPac.addEventListener('change', (e) => {
    if(e.target.checked) {
        insertForm();
    } else {
      restoreSelect();
        
    }
})
