const btnabrirmodal = document.querySelector("#btnabrir");

const btnenviar = document.querySelector("#btnenviar");

const modal = document.querySelector("#modal");

btnabrirmodal.addEventListener("click", () => {
  modal.showModal();
});

btnenviar.addEventListener("click", () => {
  modal.close();
});
