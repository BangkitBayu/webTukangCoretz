import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

const apiUrl = "http://localhost:8000/";

document.addEventListener("alpine:init", () => {
    Alpine.store("formTestimonial", {
        isEdit: false,
        show: false,

        // Form data for edit
        formData: {
            id: null,
            name: "",
            position: "",
            comment: "",
            rating: "",
            isShow: 0,
        },

        toggle() {
            this.show = !this.show;
        },

        // For edit testimonial
        toggleIsEdit() {
            this.isEdit = !this.isEdit;
        },

        async openFormEdit(id) {
            this.show = !this.show;
            this.isEdit = true;

            try {
                const response = await fetch(apiUrl + `testimonial/${id}`);

                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const data = await response.json();
                this.formData = data;
                console.log(this.formData);
            } catch (error) {
                console.error(error.message);
            }
        },

        closeFormEdit() {
            this.show = !this.show;
            this.isEdit = false;
            this.formData = {
                id: null,
                name: "",
                position: "",
                comment: "",
                rating: "",
                isShow: 0,
            };
        },
    });
});

Alpine.start();
