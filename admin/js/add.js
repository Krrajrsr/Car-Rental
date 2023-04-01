
        document.addEventListener('DOMContentLoaded', function () {
            // Get the add car button from the header
            var addCarButton = document.getElementById("add-car-btn");

            // Get the modal
            var modal = document.getElementById("add-car-modal");

            // When the user clicks the button, open the modal
            addCarButton.onclick = function () {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            var span = modal.getElementsByClassName("close")[0];
            span.onclick = function () {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            // Handle the cancel button
            var cancelButton = modal.querySelector(".cancel");
            cancelButton.addEventListener("click", function () {
                modal.style.display = "none";
            });
        });
