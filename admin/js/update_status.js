var toggleAvailabilityButtons = document.querySelectorAll('.toggle-availability-btn');
toggleAvailabilityButtons.forEach(function (button) {
    button.addEventListener('click', function () {
        var carId = button.dataset.carId;
        var newAvailability = button.classList.contains('btn-success') ? 0 : 1;
        var newButtonText = newAvailability == 1 ? 'Available' : 'Unavailable';
        button.classList.toggle('btn-success');
        button.classList.toggle('btn-warning');
        button.textContent = newButtonText;

        //AJAX request
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'update_availability.php', true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function () {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send('car_id=' + carId + '&availability=' + newAvailability);
    });
});