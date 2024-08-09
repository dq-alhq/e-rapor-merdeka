import { persist } from "@alpinejs/persist";
import "./bootstrap";

import { collapse } from "@alpinejs/collapse";
import Alpine from "alpinejs";
import Choices from "choices.js";

window.Alpine = Alpine;

Alpine.plugin([persist, collapse]);
Alpine.start();

document.querySelectorAll(".choice").forEach((el) => {
    new Choices(el, { allowHTML: true, duplicateItemsAllowed: false });
});
