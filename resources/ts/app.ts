import Alpine from "alpinejs";

// @ts-ignore
window.Alpine = Alpine;

// S'assurer que le DOM est prêt avant de démarrer Alpine
if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", () => {
    Alpine.start();
    console.log("Alpine started after DOM ready");
  });
} else {
  // DOM déjà chargé
  Alpine.start();
  console.log("Alpine started immediately");
}
