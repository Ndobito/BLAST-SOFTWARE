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
