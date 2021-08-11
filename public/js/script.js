//variavel que recebe o elemento html(Modal)
var confirmationModal = document.getElementById('confirmationModal')

//Adiciona um evento, toda vez que o modal for aberto
confirmationModal.addEventListener('show.bs.modal', function(event) {

  //Variavel que recebe botão que acionou o modal
  var button = event.relatedTarget

  //Variavel que recebe o formulario do modal
  var form = document.getElementById('formDeletePhoto')

  //Alterando o Action(rota) do formulário
  form.action = "/photos/" + button.getAttribute('data-photo-id')

})