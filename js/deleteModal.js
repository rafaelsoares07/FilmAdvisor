/*const buttons = document.querySelectorAll(".btn-delete");

buttons.forEach(function(button) {
  button.addEventListener("click", function() {
    const dialog = button.closest('.open-modal').querySelector('dialog');

    dialog.show();
    // Adicione aqui o restante da lógica desejada para manipular o evento de clique do botão.
  });
});
*/

console.log("ola");


const value = document.querySelector("#value-range");
const input = document.querySelector("#pi_input");

console.log(value);
console.log(input);

value.textContent = input.value;
input.addEventListener("input", (event) => {
  console.log("valor");
  value.textContent = event.target.value;
});