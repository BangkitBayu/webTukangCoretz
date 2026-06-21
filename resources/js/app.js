import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

const apiUrl = "http://localhost:8000/";

document.addEventListener("alpine:init", () => {
    Alpine.store("categories", {
        collection: [],
        collectionWithCount: [],

        formData: {
            id: null,
            name: "",
            count_project: "",
        },

        searchCategory: "",

        filteredCategory() {
            return this.collectionWithCount.filter((c) =>
                c.name
                    .toLowerCase()
                    .includes(this.searchCategory.toLowerCase()),
            );
        },

        async getCategoryById(id) {
            try {
                const response = await fetch(apiUrl + `categories/${id}`);

                if (!response.ok) {
                    throw new Error(response.message);
                }

                const payload = await response.json();
                this.formData = payload.data;
                // console.log(payload.data);
            } catch (error) {
                console.log(error.message);
            }
        },

        resetFormData() {
            return {
                id: null,
                name: "",
                count_project: "",
            };
        },
    });

    Alpine.store("formProject", {
        openForm: false,
        isEdit: false,

        formData: {
            id: null,
            name: "",
            slug: "",
            description: "",
            thumbnail: "",
            start_date: "",
            end_date: "",
            is_show: 0,
            category_id: "",
        },

        toggle() {
            this.openForm = !this.openForm;
            this.isEdit = false;
        },

        closeFormEdit() {
            this.openForm = !this.openForm;
            this.isEdit = !this.isEdit;

            this.formData = {
                id: null,
                name: "",
                slug: "",
                description: "",
                thumbnail: "",
                start_date: "",
                end_date: "",
                is_show: 0,
                category_id: "",
            };
        },

        async openFormEdit(id) {
            this.openForm = !this.openForm;
            this.isEdit = true;

            try {
                const response = await fetch(apiUrl + `projects/${id}`);

                if (!response.ok) {
                    throw new Error(`Response status: ${response.status}`);
                }

                const data = await response.json();
                this.formData = data;
            } catch (error) {
                console.error(error.message);
            }
        },
    });

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
