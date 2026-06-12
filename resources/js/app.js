import "./bootstrap";

import Alpine from "alpinejs";

window.Alpine = Alpine;

document.addEventListener("alpine:init", () => {
    Alpine.store("formTestimonial", {
        show: false,

        toggle() {
            this.show = !this.show;
        },
    });
});

Alpine.start();
