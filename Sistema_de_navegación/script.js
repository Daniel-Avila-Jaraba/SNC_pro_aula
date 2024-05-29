document.addEventListener("DOMContentLoaded", () => {
    const profileForm = document.getElementById("profile-form");
    const profileImageInput = document.getElementById("profile-image");
    const imagePreview = document.getElementById("image-preview");

    profileImageInput.addEventListener("change", () => {
        const file = profileImageInput.files[0];
        const reader = new FileReader();

        reader.onloadend = () => {
            imagePreview.src = reader.result;
            imagePreview.style.display = "block";
        };

        if (file) {
            reader.readAsDataURL(file);
        } else {
            imagePreview.src = "";
            imagePreview.style.display = "none";
        }
    });

    profileForm.addEventListener("submit", (event) => {
        event.preventDefault();
        const profileName = document.getElementById("profile-name").value;
        const profileImage = imagePreview.src;

        const newProfileHTML = `
            <div class="col-6 col-md-3 profile">
                <img src="${profileImage}" alt="${profileName}" class="img-fluid rounded-circle">
                <p>${profileName}</p>
            </div>
        `;

        const profilesContainer = document.querySelector(".row.justify-content-center");
        profilesContainer.insertAdjacentHTML("beforeend", newProfileHTML);

        $('#profileModal').modal('hide');
    });
});