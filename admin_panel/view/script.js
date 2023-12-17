
document.addEventListener("DOMContentLoaded", function () {
    const checkboxes = document.querySelectorAll('.scroll-menu .checkScroll');

    function handleCheckboxChange(checkbox) {
        // Wenn die aktuelle Checkbox aktiviert ist,
        // deaktiviere alle anderen Checkboxes
        if (checkbox.checked) {
            checkboxes.forEach(function (otherCheckbox) {
                if (otherCheckbox !== checkbox) {
                    otherCheckbox.checked = false;
                }
            });
        }
    }
});


