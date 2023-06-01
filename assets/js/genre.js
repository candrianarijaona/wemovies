// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
    // Get all the checkboxes
    const checkboxes = document.querySelectorAll('input[type="checkbox"][name="genreId"]');
    // Attach a change event listener to each checkbox
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', function () {
            const checkedIds = [];

            checkboxes.forEach(function (checkbox) {
                if (checkbox.checked) {
                    checkedIds.push(checkbox.value);
                }
            });

            // Generate the URL with the checked IDs
            let url = window.location.href.split('#')[0];
            url =  url.split('?')[0] + '?genreId=' + checkedIds.join(',');

            // Reload the page with the new URL
            window.location.href = url;
        });
    });
});