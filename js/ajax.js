'use strict';

const selects = document.querySelectorAll('select'),
  cardsBlock = document.querySelector('.cards-block');

function handler(item) {

  const key = item.getAttribute('name'),
    value = item.value;

  getData(key, value)
    .then(response => {
      if (!response.ok) {
        throw new Error('Error');
      }
      return response.text();
    })
    .then(data => {
      cardsBlock.innerHTML = '';
      cardsBlock.insertAdjacentHTML('afterbegin', data);
    })
    .catch(error => console.error(error));
}


const getData = (key, value) => fetch(`../actions/query.php?${key}=${value}`);

selects.forEach(select => {
  select.addEventListener('change', () => handler(select));
})
