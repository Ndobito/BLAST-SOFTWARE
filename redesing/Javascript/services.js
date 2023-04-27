let panel1 = document.getElementById("reserve-citas");
let panel2 = document.getElementById("reserve-surgeries");
let panel3 = document.getElementById("reserve-lab");
let panel4 = document.getElementById("reserve-xrays");

function exit(a) {
    switch (a) {
        case 1:
            panel1.style.display = "none";
            break;
        case 2:
            panel2.style.display = "none";
            break;
        case 3:
            panel3.style.display = "none";
            break;
        case 4:
            panel4.style.display = "none";
            break;
        default:
            console.log("Invalido")
            break;
    }
    
}


function reserver(opc){

    switch (opc) {
        case 1:
            panel1.style.display = "block";
            break;
        case 2:
            panel2.style.display = "block";
            break;
        case 3:
            panel3.style.display = "block";
            break;
        case 4:
            panel4.style.display = "block";
            break;
    
        default:
            break;
    }
}

// Calendar 

function generateCurrentMonthCalendar() {
    const today = new Date();
    const year = today.getFullYear()
    const month = today.getMonth();
    generateCalendar(year, month);
  
}
function generateCalendar(year, month) {
  const daysInMonth = new Date(year, month + 1, 0).getDate();
  const startDay = new Date(year, month, 1).getDay();
  
  const tbody = document.getElementById('calendar-body');
  tbody.innerHTML = '';
  
  let date = 1;
  for (let i = 0; i < 6; i++) {
    const row = document.createElement('tr');
    for (let j = 0; j < 7; j++) {
      const cell = document.createElement('td');
      if (i === 0 && j < startDay) {
        cell.innerText = '';
      } else if (date > daysInMonth) {
        cell.innerText = '';
      } else {
        cell.innerText = date;
        date++;
      }
      row.appendChild(cell);
    }
    tbody.appendChild(row);
  }
}


