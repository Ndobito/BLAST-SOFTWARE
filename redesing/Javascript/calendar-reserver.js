function containerCalendar(container) {
  const year = new Date().getFullYear();

  const months = [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre"
  ];

  const daysOfWeek = ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"];

  const calendarContainer = document.getElementById(container);

  for (let i = 0; i < months.length; i++) {

  const slideContainer = document.createElement("div");
  slideContainer.classList.add("slide");
  calendarContainer.appendChild(slideContainer);

  const table = document.createElement("table");

  const caption = document.createElement("caption");
  const captionText = document.createTextNode(months[i] + " " + year);
  caption.appendChild(captionText);
  table.appendChild(caption);

  const daysOfWeekRow = document.createElement("tr");

  for (let j = 0; j < daysOfWeek.length; j++) {
    const cell = document.createElement("th");
    const dayOfWeekName = document.createTextNode(daysOfWeek[j]);
    cell.appendChild(dayOfWeekName);
    daysOfWeekRow.appendChild(cell);
  }

  table.appendChild(daysOfWeekRow);

  const daysInMonth = new Date(year, i + 1, 0).getDate();
  const firstDayOfWeek = new Date(year, i, 1).getDay();

  let date = 1;
  for (let j = 0; j < 6; j++) {
    const weekRow = document.createElement("tr");

    for (let k = 0; k < 7; k++) {
      const cell = document.createElement("td");

      if (j === 0 && k < firstDayOfWeek || date > daysInMonth) {
        const dayNumber = document.createTextNode("");
                    cell.appendChild(dayNumber);
      if(cell == ""){
        // Code
      }else{
        cell.classList.add(k);
      }

    } else {
      const dayNumber = document.createTextNode(date);
      cell.appendChild(dayNumber);
      date++;
    }

    weekRow.appendChild(cell);
  }

  table.appendChild(weekRow);
}

slideContainer.appendChild(table);
}

} 

// Event Calendar

const td = document.getElementsByTagName("td");





let calendarCitas = document.getElementById("container-info-reserve1");

for (let z = 0; z < td.length; z++) {
  td[z].addEventListener("click", () => {
    if(td[z].textContent === ""){
      calendarCitas.innerHTML = "";
    }
    else{
      calendarCitas.innerHTML= "No tienes ninguna cita registrada";
    }
  });
}
