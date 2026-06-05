document.addEventListener("DOMContentLoaded", function () {

    // ============================================
    // УТИЛІТИ
    // ============================================

    function findElement(selector, context = document) {
        try {
            return context.querySelector(selector);
        } catch (e) {
            console.warn(`[findElement] Невірний селектор: "${selector}"`, e);
            return null;
        }
    }

    function setVal(form, selector, value, silent = false) {
        if (!form) {
            console.warn('[setVal] Форма не знайдена');
            return;
        }

        const field = findElement(selector, form);

        if (!field) {
            if (!silent) console.warn(`[setVal] Поле не знайдено: "${selector}"`);
            return;
        }

        field.value = value ?? '';
    }

    function setSelect(form, name, value, silent = false) {
        if (!form) {
            console.warn('[setSelect] Форма не знайдена');
            return;
        }

        if (value === null || value === undefined) {
            if (!silent) console.warn(`[setSelect] Значення для "${name}" відсутнє`);
            return;
        }

        const select = findElement(`select[name="${name}"]`, form);

        if (!select) {
            if (!silent) console.warn(`[setSelect] Select "${name}" не знайдено`);
            return;
        }

        const options = [...select.options];
        const match = options.find(opt => opt.value == value);

        if (!match) {
            console.warn(`[setSelect] Опція зі значенням "${value}" не знайдена в "${name}"`);
            return;
        }

        options.forEach(opt => opt.selected = opt.value == value);
    }

    function getAttr(btn, attr) {
        if (!btn) {
            console.warn('[getAttr] Кнопка не знайдена');
            return null;
        }

        const value = btn.getAttribute(attr);

        if (value === null) {
            console.warn(`[getAttr] Атрибут "${attr}" відсутній на елементі`, btn);
        }

        return value;
    }

    // ============================================
    // 1. ПОКАЗАТИ / СХОВАТИ КОЛОНКУ ВИДАЛЕННЯ
    // ============================================

    const deleteButton = document.getElementById("deleteButton");

    if (deleteButton) {
        deleteButton.addEventListener("click", (e) => {
            e.preventDefault();

            const cells = document.querySelectorAll(".row-actions-cell-delete");

            if (!cells.length) {
                console.warn('[deleteButton] Не знайдено жодної клітинки .row-actions-cell-delete');
                return;
            }

            cells.forEach(cell => cell.classList.toggle("hidden"));
        });
    }

    // ============================================
    // 2. ПОКАЗАТИ / СХОВАТИ КОЛОНКУ РЕДАГУВАННЯ
    // ============================================

    const updateButton = document.getElementById("updateButton");

    if (updateButton) {
        updateButton.addEventListener("click", (e) => {
            e.preventDefault();

            const cells = document.querySelectorAll(".row-actions-cell-update");

            if (!cells.length) {
                console.warn('[updateButton] Не знайдено жодної клітинки .row-actions-cell-update');
                return;
            }

            cells.forEach(cell => cell.classList.toggle("hidden"));
        });
    }

    // ============================================
    // 3. ГЛОБАЛЬНА ОБРОБКА КЛІКІВ (таблиця + мобільні картки)
    // ============================================

    document.addEventListener('click', function (event) {

        // --- DELETE ---
        const deleteBtn = event.target.closest('.btn-delete-trigger');

        if (deleteBtn) {
            const deleteForm = document.getElementById('delete-income-form');

            if (!deleteForm) {
                console.error('[DELETE] Форма #delete-income-form не знайдена в DOM');
                return;
            }

            const action = getAttr(deleteBtn, 'data-action');

            if (!action) {
                console.error('[DELETE] Відсутній data-action на кнопці видалення', deleteBtn);
                return;
            }

            deleteForm.setAttribute('action', action);
            return;
        }

        // --- EDIT ---
        const editBtn = event.target.closest('.btn-edit-trigger');

        if (!editBtn) return;

        setTimeout(() => {
            try {
                const form = document.getElementById('update-income-form');

                if (!form) {
                    console.error('[EDIT] Форма #update-income-form не знайдена в DOM');
                    return;
                }

                const action = getAttr(editBtn, 'data-action');
                if (!action) return;

                form.setAttribute('action', action);

                // Спільні поля
                setVal(form, 'input[name="amount"]',         getAttr(editBtn, 'data-amount'));
                setVal(form, 'textarea[name="description"]', getAttr(editBtn, 'data-description'));

                // Дата
                const rawDate = getAttr(editBtn, 'data-date');
                const dateOnly = rawDate ? rawDate.split(' ')[0] : '';

                // silent=true — не логувати якщо поле відсутнє (залежить від сторінки)
                setVal(form, 'input[name="income_date"]',  dateOnly, true);
                setVal(form, 'input[name="expense_date"]', dateOnly, true);

                // Спільні select
                setSelect(form, 'accounts', getAttr(editBtn, 'data-account'));
                setSelect(form, 'currency', getAttr(editBtn, 'data-currency'));

                // Специфічні select — одне з двох є в DOM залежно від сторінки
                setSelect(form, 'income_sources', getAttr(editBtn, 'data-source'), true);
                setSelect(form, 'category_id',    getAttr(editBtn, 'data-category'), true);

                // Чекбокс
                const checkbox = findElement('input[name="is_recurring"][type="checkbox"]', form);
                if (checkbox) {
                    checkbox.checked = getAttr(editBtn, 'data-recurring') == '1';
                }

            } catch (err) {
                console.error('[EDIT] Непередбачена помилка:', err);
            }
        }, 50);
    });
});
