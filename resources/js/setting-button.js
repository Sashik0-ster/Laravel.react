document.addEventListener("DOMContentLoaded", function () {

    // 1. ПОКАЗАТИ / СХОВАТИ КОЛОНКУ ВИДАЛЕННЯ
    const deleteButton = document.getElementById("deleteButton");
    if (deleteButton) {
        deleteButton.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelectorAll(".row-actions-cell-delete").forEach(cell => {
                cell.classList.toggle("hidden");
            });
        });
    }

    // 2. ПОКАЗАТИ / СХОВАТИ КОЛОНКУ РЕДАГУВАННЯ
    const updateButton = document.getElementById("updateButton");
    if (updateButton) {
        updateButton.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelectorAll(".row-actions-cell-update").forEach(cell => {
                cell.classList.toggle("hidden");
            });
        });
    }

    // 3. ОБРОБКА КЛІКІВ ВСЕРЕДИНІ ТАБЛИЦІ
    const table = document.querySelector('table');
    if (table) {
        table.addEventListener('click', function (event) {

            // --- DELETE ---
            const deleteBtn = event.target.closest('.btn-delete-trigger');
            if (deleteBtn) {
                const deleteForm = document.getElementById('delete-income-form');
                if (deleteForm) {
                    deleteForm.setAttribute('action', deleteBtn.getAttribute('data-action'));
                }
                return;
            }

            // --- EDIT ---
            const editBtn = event.target.closest('.btn-edit-trigger');
            if (!editBtn) return;

            setTimeout(() => {
                const form = document.getElementById('update-income-form');
                if (!form) return;

                const setVal = (selector, value) => {
                    const field = form.querySelector(selector);
                    if (field) field.value = value ?? '';
                };

                const setSelect = (name, value) => {
                    const select = form.querySelector(`select[name="${name}"]`);
                    if (!select) return;
                    [...select.options].forEach(opt => {
                        opt.selected = opt.value == value;
                    });
                };

                form.setAttribute('action', editBtn.getAttribute('data-action'));

                setVal('input[name="amount"]',         editBtn.getAttribute('data-amount'));
                setVal('input[name="income_date"]',    editBtn.getAttribute('data-date')?.split(' ')[0]);
                setVal('textarea[name="description"]', editBtn.getAttribute('data-description'));

                setSelect('accounts',       editBtn.getAttribute('data-account'));
                setSelect('currency',       editBtn.getAttribute('data-currency'));
                setSelect('income_sources', editBtn.getAttribute('data-source'));

                const checkbox = form.querySelector('input[name="is_recurring"][type="checkbox"]');
                if (checkbox) {
                    checkbox.checked = editBtn.getAttribute('data-recurring') == '1';
                }

            }, 50);
        });
    }

});
