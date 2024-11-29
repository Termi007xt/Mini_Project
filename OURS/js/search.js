// document.querySelector('.search-form').addEventListener('submit', function(event) {
//     event.preventDefault();
// });

let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>
{
    searchForm.classList.toggle('active');
}