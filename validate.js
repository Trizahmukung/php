function validateForm() {
    const name = document.getElementById("name").value;
    const email = document.getElementById("email").value;
    const feedback = document.getElementById("feedback").value;
    const rating = document.getElementById("rating").value;
    if (!name || !email || !feedback || !rating) {
        alert("Please fill out all fields.");
        return false;
    }
    if (rating < 1 || rating > 5) {
        alert("Rating must be between 1 and 5.");
        return false;
    }
    return true;
}
