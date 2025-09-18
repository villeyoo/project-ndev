const tabs = document.querySelectorAll('.tab-btn');
const forms = document.querySelectorAll('.tab-form');

tabs.forEach(tab => {
    tab.addEventListener('click', () => {
        // Hapus active dari semua tombol dan form
        tabs.forEach(t => t.classList.remove('active'));
        forms.forEach(f => f.classList.remove('active'));

        // Tambahkan active ke tombol dan form yang dipilih
        tab.classList.add('active');
        const selectedForm = document.getElementById(tab.dataset.tab);
        selectedForm.classList.add('active');
    });
});
