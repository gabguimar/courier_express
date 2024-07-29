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
