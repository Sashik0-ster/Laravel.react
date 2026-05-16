document.addEventListener("DOMContentLoaded", function () {
    const deleteButton = document.getElementById("deleteButton");

    const actionCellsDelete = document.querySelectorAll(".row-actions-cell-delete");

    if (deleteButton) {
        deleteButton.addEventListener("click", (e) => {
            e.preventDefault();

            actionCellsDelete.forEach(cell => {
                cell.classList.toggle("hidden");
            });
        });
    }

    const updateButton = document.getElementById("updateButton");

    const actionCellsUpdate = document.querySelectorAll(".row-actions-cell-update");

    if (updateButton) {
        updateButton.addEventListener("click", (e) => {
            e.preventDefault(); // Запобігає переходу по посиланню (href="#")

            // Перемикаємо клас hidden для кожної комірки (показує/ховає всю колонку)
            actionCellsUpdate.forEach(cell => {
                cell.classList.toggle("hidden");
            });
        });
    }

});
