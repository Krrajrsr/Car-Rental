    const saveRentPerDayBtns = document.querySelectorAll('.save-rent-per-day-btn');
    saveRentPerDayBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            const card = btn.closest('.card');
            const rentPerDayInput = card.querySelector('input[type="number"]');
            const rentPerDayValue = rentPerDayInput.value;
            const carId = btn.getAttribute('data-car-id');
            updateRentPerDay(carId, rentPerDayValue, card);
        });
    });

    function updateRentPerDay(carId, rentPerDayValue, card) {
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'rent_per_day.php');
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                card.querySelector('.rent-per-day-edit').classList.remove('show');
                card.querySelector('p.rent-per-day').textContent = `Rent Per Day: ${rentPerDayValue}`;
            } else {
                alert('Error: ' + xhr.responseText);
            }
        };
        xhr.send(`car_id=${carId}&rent_per_day=${rentPerDayValue}`);
    }
