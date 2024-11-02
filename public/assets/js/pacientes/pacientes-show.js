$(document).ready(function() {
    checkAppointments();
})
let id = $('#paciente_id').val(),
    citas_a_tomar;
const checkAppointments = () =>{ 
    const doneAppointments = parseInt($('#citasTomadas').text());
    const totalAppointments = parseInt($('#citasTotales').text());

    if(doneAppointments >= totalAppointments){
        showEditIcon();
    }else{
        $('.edit-icon').hide();
        $('.edit-btn').hide();
        $('#citas_a_tomar').hide();
        $('#saveCitas').hide();
    }
}

const showEditIcon = () =>{
    $('.edit-btn').show();
    $('.edit-icon').show();
    $('#citas_a_tomar').hide();
    $('#saveCitas').hide();
}

$(".edit-btn").click(function (e) {
    e.preventDefault();
    $('.citasContainer').empty();
    $('#citas_a_tomar').show();
    $('#saveCitas').show();
    
})

$("#saveCitas").click(function (e) {
    e.preventDefault();
    updateAppointments();
})

const updateAppointments = async () =>{
    const URL = 'http://127.0.0.1:8000/pacientes';

    const citas_a_tomar = $('#citas_a_tomar').val();
    const data = {
        'id': parseInt(id),
        'citas_a_tomar': parseInt(citas_a_tomar),
    }
   await axios.patch(`${URL}/updateAppointment/${id}`, data).then((response) => {
       console.log(response);
       id = ''
       location.reload();
   }).catch((error) => {
       console.log(error);
   })
    
}