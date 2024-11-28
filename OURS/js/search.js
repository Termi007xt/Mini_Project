document.addEventListener('DOMContentLoaded', () => {
    let searchForm = document.querySelector('.search-form');
    let searchBtn = document.querySelector('#search-btn');

    if (searchForm && searchBtn) {
        searchBtn.onclick = () => {
            searchForm.classList.toggle('active');
        };
    } else {
        console.error('Search form or button not found!');
    }
});
