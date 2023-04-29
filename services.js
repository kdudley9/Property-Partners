const modals = document.querySelectorAll('.modal');
const buttons = document.querySelectorAll('.card img');

function setUpModal(modal) {
  const button = modal.previousElementSibling.querySelector('img');
  const span = modal.querySelector('.close');

  button.addEventListener('click', () => {
    modal.style.display = 'block';
  });

  span.addEventListener('click', () => {
    modal.style.display = 'none';
  });
}

modals.forEach(setUpModal);