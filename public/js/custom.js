/** 
 * Função responsável por mover o hover para o topo.
 */
let mybutton = document.getElementById("btn-back-to-top");

mybutton.addEventListener("click", backToTop);

function backToTop() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
