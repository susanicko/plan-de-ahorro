document.addEventListener('DOMContentLoaded', function() {
    const currentDate = new Date();
    let year = currentDate.getFullYear();
    let month = currentDate.getMonth();
  
    const monthAndYear = document.getElementById('monthAndYear');
    const calendarDays = document.getElementById('calendarDays');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
  
    showCalendar(year, month);
  
    prevBtn.addEventListener('click', () => {
      month--;
      if (month < 0) {
        month = 11;
        year--;
      }
      showCalendar(year, month);
    });
  
    nextBtn.addEventListener('click', () => {
      month++;
      if (month > 11) {
        month = 0;
        year++;
      }
      showCalendar(year, month);
    });
  
    function showCalendar(year, month) {
      const firstDay = new Date(year, month, 1);
      const lastDay = new Date(year, month + 1, 0);
      const daysInMonth = lastDay.getDate();
  
      monthAndYear.textContent = `${new Intl.DateTimeFormat('es-ES', { month: 'long' }).format(firstDay)} ${year}`;
  
      let dayCounter = 1;
      calendarDays.innerHTML = '';
  
      for (let i = 0; i < firstDay.getDay(); i++) {
        const emptyDay = document.createElement('div');
        calendarDays.appendChild(emptyDay);
      }
  
      for (let day = 1; day <= daysInMonth; day++) {
        const calendarDay = document.createElement('div');
        calendarDay.textContent = day;
        calendarDays.appendChild(calendarDay);
  
        const today = new Date();
        if (year === today.getFullYear() && month === today.getMonth() && day === today.getDate()) {
          calendarDay.classList.add('today');
        }

        calendarDay.addEventListener('click', () => {
          const selectedDay = document.querySelector('.selected');
          if (selectedDay) {
            selectedDay.classList.remove('selected');
          }
          calendarDay.classList.add('selected');
        });
      }
    }
  });