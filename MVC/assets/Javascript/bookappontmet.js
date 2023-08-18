
    // Obtener el campo de selección de la hora
    const horaInput = document.getElementById("hora");

    // Obtener la hora actual y sumarle una hora
    const now = new Date();
    const oneHourLater = new Date(now.getTime() + 60 * 60 * 1000);

    // Formatear la hora en formato HH:mm
    const maxHour = `${String(oneHourLater.getHours()).padStart(2, '0')}:${String(oneHourLater.getMinutes()).padStart(2, '0')}`;

    // Establecer el atributo max en el campo de selección de la hora
    horaInput.max = maxHour;

