let option,
    today = moment().format("YYYY-MM-DD"),
    year = moment().format("YYYY"),
    citas = [];
$(document).ready( function () {
    $(".filtroMes").hide();
    $(".filtroYear").hide();
    $(".filtroDate").hide();
    $('#limpiarFiltros').hide();
    getCitas().then(() => {
        showStatsToday();
    });
     
});
const getCitas = async () => {
    const URL = "http://127.0.0.1:8000/agenda";
    const response = await axios.get(URL);
    citas = response.data;
};
const showInput = (type) => {
    switch (type) {
        case "mes":
            $(".filtroMes").show();
            $(".filtroYear").hide();
            $(".filtroDate").hide();
            $(".filtroMes").css("display", "flex");
            break;
        case "year":
            $(".filtroYear").show();
            $(".filtroMes").hide();
            $(".filtroDate").hide();
            $(".filtroYear").css("display", "flex");
            $("#input-year").css("width", "10em");
            $("#input-year").val(year);
            break;
        case "dia":
            $(".filtroDate").show();
            $(".filtroMes").hide();
            $(".filtroYear").hide();
            $(".filtroDate").css("display", "flex");
            break;
        default:
            break;
    }
};

const getAllDaysInMonth = (month) => {
    let dates = [];
    const fc = moment(month, "YYYY-MM");
    const daysInMonth = fc.daysInMonth();

    for (let i = 1; i <= daysInMonth; i++) {
        dates.push(fc.format("YYYY-MM-DD"));
        fc.add(1, "d");
    }
    return dates;
};

const getAllHoursInDay = (day) => {
    let hours = [];
    for (let i = 0; i < 24; i++) {
        if (i < 10) {
            hours.push(`0${i}:00`);
            hours.push(`0${i}:30`);
        } else {
            hours.push(`${i}:00`);
            hours.push(`${i}:30`);
        }
    }
    return hours;
}
const showStatsToday = () => {
    const res = citas.filter((cita) => {
        return moment(cita.start).format("YYYY-MM-DD") === today;
    });
    
    const resOrdered = res.sort((a, b) => {
        return new Date(a.start) - new Date(b.start);
    });
    const resFormatted = resOrdered.map((cita) => {
        return {
            ...cita,
            start: moment(cita.start).format("HH:mm"),
        };
    });

    const hours = getAllHoursInDay(today);
    const citasPorHora = {};
    resFormatted.forEach((cita) => {
        const hora = cita.start
        if (citasPorHora[hora]) {
            citasPorHora[hora]++;
        } else {
            citasPorHora[hora] = 1;
        }
    });

    const datos = hours.map((hour) => {
        return citasPorHora[hour] || 0;
    });

    chart.data.datasets[0].label = 'Citas de hoy';
    chart.data.labels = hours;
    chart.data.datasets[0].data = datos;
    chart.update();
}
$("#select-tipo").on("change", () => {
    option = $("#select-tipo").val();
    $("#limpiarFiltros").show().css({
        'display': 'flex',
        'justify-content': 'center',
        'align-items': 'center',
        'width': '10em',
        'font-size': '1em',
    })

    showInput(option);
});

$("#filtrar-mes").on("click", async () => {
    chart.data.datasets[0].data = []; 
    chart.data.datasets[0].label = '';
    const val = $("#input-mes").val();
    const res = citas.filter((cita) => {
        return moment(cita.start).format("YYYY-MM") === val;
    });

    const dates = getAllDaysInMonth(val);
    const resFormatted = res.map((cita) => {
        return {
            ...cita,
            start: moment(cita.start).format("YYYY-MM-DD"),
        };
    });
    const orderedData = resFormatted.sort((a, b) => {
        return new Date(a.start) - new Date(b.start);
    });
    const citasPorFecha = {};
    orderedData.forEach((cita) => {
        const fecha = cita.start;
        if (citasPorFecha[fecha]) {
            citasPorFecha[fecha]++;
        } else {
            citasPorFecha[fecha] = 1;
        }
    });
    const   datos = dates.map((date) => {
        return citasPorFecha[date] || 0; 
    });
    
    chart.data.labels = dates;
    chart.data.datasets[0].data = datos;
    chart.data.datasets[0].label = 'Citas del Mes';
    chart.update();
});

$("#filtrar-year").on("click", () => {
    chart.data.datasets[0].data = []; 
    chart.data.labels = [
        "January",
        "February",
        "March",
        "April",
        "May",
        "June",
        "July",
        "August",
        "September",
        "October",
        "November",
        "December",
    ];
    const val = $("#input-year").val();
    const res = citas.filter((cita) => {
        return moment(cita.start).format("YYYY") === val;
    });
    const resFormatted = res.map((cita) => {
        return {
            ...cita,
            start: moment(cita.start).format("MMMM"),
        };
    })
    const orderedData = resFormatted.sort((a, b) => {
        return new Date(a.start) - new Date(b.start);
    });
   
    const citasPorMes = {};
    orderedData.forEach((cita) => {
        const mes = cita.start;
        if (citasPorMes[mes]) {
            citasPorMes[mes]++;
        } else {
            citasPorMes[mes] = 1;
        }
    })
    const datosYear = chart.data.labels.map((label) => {
        return citasPorMes[label] || 0;
    })
    console.log(datosYear);
    chart.data.datasets[0].label = 'Citas del año';
    chart.data.datasets[0].data = datosYear;
    chart.update();
});
$("#filtrar-date").on("click", () => {
    chart.data.datasets[0].data = []; 
    chart.data.datasets[0].label = "";
    const val = $("#input-date").val();
    const res = citas.filter((cita) => {
        return moment(cita.start).format("YYYY-MM-DD") === val;
    })
    const resOrdered = res.sort((a, b) => {
        return new Date(a.start) - new Date(b.start);
    });
    const resFormatted = resOrdered.map((cita) => {
        return {
            ...cita,
            start: moment(cita.start).format("HH:mm"),
        };
    })
    const hours = getAllHoursInDay(val);
    const citasPorHora = {};
    resFormatted.forEach((cita) => {
        const hora = cita.start
        if (citasPorHora[hora]) {
            citasPorHora[hora]++;
        } else {
            citasPorHora[hora] = 1;
        }
    })
    const datos = hours.map((hour) => {
        return citasPorHora[hour] || 0;
    })
    chart.data.datasets[0].data = datos;  
    chart.data.datasets[0].label = `Citas del dia`;  
    chart.data.labels = hours;
    chart.update();
    
});

$("#limpiarFiltros").on("click", () => {
    
    showStatsToday();
    $(".filtroMes").hide();
    $(".filtroYear").hide();
    $(".filtroDate").hide();
    $("#input-mes").val('')
    $("#input-year").val('')
    $("#input-date").val('')
    $('#select-tipo').val('').trigger('change');
    $("#limpiarFiltros").hide();

})

const ctx = document.querySelector("#myChart");

const chart = new Chart(ctx, {
    type: "bar",
    data: {
        labels: [],
        datasets: [
            {
                label: '',
                data: [],
                backgroundColor: "#f3545d",
                borderColor: "#f3545d",
                borderWidth: 1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                beginAtZero: true,
            },
        },
    },
});
