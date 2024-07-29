//######################## Script para dar animação a sidebar ########################
document.getElementById("encomendas-link").addEventListener("click", function(event) {
  event.preventDefault(); // Evita que o link redirecione a página
  var dropdownMenu = document.getElementById("item-drop-menu");

  // Alterna a classe 'show' para aplicar a transição de visibilidade
  if (dropdownMenu.classList.contains("show")) {
    dropdownMenu.classList.remove("show");
    // Usar uma pequena pausa para permitir que a transição de opacidade funcione
    setTimeout(() => dropdownMenu.style.display = "none", 300); // Tempo da transição
  } else {
    dropdownMenu.style.display = "block";
    // Força a reavaliação do display para garantir que a transição ocorra
    requestAnimationFrame(() => dropdownMenu.classList.add("show"));
  }
});
//#####################################################################################
// javascript.js

document.addEventListener('DOMContentLoaded', function () {
  const sidebar = document.querySelector('nav.menu-lateral');
  const content = document.querySelector('.content');
  const toggleButton = document.getElementById('toggle-sidebar');

  toggleButton.addEventListener('click', function () {
    if (sidebar.classList.contains('contraido')) {
      sidebar.classList.remove('contraido');
      sidebar.classList.add('expandido');
      content.classList.remove('contraido');
      content.classList.add('expandido');
    } else {
      sidebar.classList.remove('expandido');
      sidebar.classList.add('contraido');
      content.classList.remove('expandido');
      content.classList.add('contraido');
    }
  });
});
