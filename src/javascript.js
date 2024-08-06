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

document.querySelectorAll('.item-menu a').forEach(link => {
  link.addEventListener('click', function(event) {
    console.log(`Link ${this.getAttribute('href')} clicado.`);
  });
});
//##########################################################################################################################################################################
function adicionarLinha() {
  // Seleciona a tabela pelo ID
  var tabela = document.getElementById("tabela_encomendas").getElementsByTagName('tbody')[0];

  // Cria uma nova linha
  var novaLinha = tabela.insertRow();

  // Cria e insere células na nova linha
  var cell1 = novaLinha.insertCell(0);
  var cell2 = novaLinha.insertCell(1);
  var cell3 = novaLinha.insertCell(2);

  // Adiciona conteúdo às células
  cell1.innerHTML = '<input type="text" class="input-text" name="produto" placeholder="Produto" />';
  cell2.innerHTML = '<input type="number" class="input-text" name="quantidade" placeholder="Quantidade" />';
  cell3.innerHTML = '<button type="button" class="btn-vermelho" onclick="removerLinha(this)">Eliminar</button>';
}

function removerLinha(botao) {
  // Remove a linha da tabela
  var row = botao.parentNode.parentNode;
  row.parentNode.removeChild(row);
}

//##########################################################################################################################################################################



