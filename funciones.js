const btnabrirmodal = document.querySelector("#btnabrir");

<<<<<<< HEAD
const btnenviar = document.querySelector("#btenviar");
=======
const btnenviar = document.querySelector("#btnenviar");
>>>>>>> d2f9b996f717245a43790665c8317b5d214e35af

const modal = document.querySelector("#modal");

btnabrirmodal.addEventListener("click", () => {
  modal.showModal();
});

btnenviar.addEventListener("click", () => {
  modal.close();
});
