 document.getElementById("perfumeForm").addEventListener("submit", function(event) {
        const seasonCheckboxes = document.querySelectorAll('input[name="seasons[]"]');
        const isChecked = Array.from(seasonCheckboxes).some(checkbox => checkbox.checked);

        if (!isChecked) {
            alert("Please select at least one season.");
            event.preventDefault();  // Prevent form submission
        }
    });