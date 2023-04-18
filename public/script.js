const table = document.getElementById('table-body');
const sortBy = document.getElementById('sort-by');
const filterBy = document.getElementById('filter-by');
const btnFilter = document.getElementById('btn-filter');
const btnSort = document.getElementById('btn-sort');
const products = JSON.parse(table.getAttribute('data-attr'));

// Ставит переданные данные в теги таблицы
function fillTable(products) {
    let tableHtml = '';
    products.forEach(p => {
        tableHtml += `<tr>
        <th scope="row">${p[0]}</th>
        <td>${p[1]}</td>
        <td>${p[2]} $</td>
    </tr>`
    })
    return tableHtml;
}

// Наполняем таблицу списком продуктов
table.innerHTML = fillTable(products);

// При клике на сортировать наполняем таблицу сортированным списком продуктов
// Сортирует по убываниб или по возрастаниб зависимо от выбора в <select>
btnSort.addEventListener('click', () => {
    let forSort = products;
    if(sortBy.value == 1) {
        forSort.sort((a,b)=>a[2]-b[2]);
        table.innerHTML = fillTable(products);
    }else {
        forSort.sort((a,b)=>b[2]-a[2]);
        table.innerHTML = fillTable(products);
    }
})

// При клике на фильтровать наполняем таблицу товарами которые содержат переданную строку
btnFilter.addEventListener('click', () => {
    let forFilter = products;
    forFilter = forFilter.filter(item => item[1].toLowerCase().includes(filterBy.value.toLowerCase()));
    table.innerHTML = fillTable(forFilter);
})