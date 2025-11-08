// public/js/logout.js
document.addEventListener('DOMContentLoaded', function () {
    // Event delegation: minden .logout-link-re működik (desktop + mobil)
    document.addEventListener('click', function (e) {
        const link = e.target.closest('.logout-link');
        if (!link) return;

        e.preventDefault();

        // Keresd meg a legközelebbi .logout-form-ot
        const form = link.closest('.logout-item')?.querySelector('.logout-form');
        if (form) {
            form.submit();
        }
    });
});