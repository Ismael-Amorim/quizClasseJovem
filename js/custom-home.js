var button = document.getElementById("exibir-resposta")



button.addEventListener("click", function () {

    var resposta = document.getElementsByClassName("resposta")

    if (resposta[0].style.display != "block") {
        resposta[0].style.display = "block"
    } else {
        resposta[0].style.display = "none"
    }

})


/*button.addEventListener("click", function () {

    var resposta2 = document.getElementById("resposta2")

    if (resposta2.style.display != "block") {
        resposta2.style.display = "block"
    } else {
        resposta2.style.display = "none"
    }

})

button.addEventListener("click", function () {

    var resposta3 = document.getElementById("resposta3")

    if (resposta3.style.display != "block") {
        resposta3.style.display = "block"
    } else {
        resposta3.style.display = "none"
    }

})

button.addEventListener("click", function () {

    var resposta4 = document.getElementById("resposta4")

    if (resposta4.style.display != "block") {
        resposta4.style.display = "block"
    } else {
        resposta4.style.display = "none"
    }

})

button.addEventListener("click", function () {

    var resposta5 = document.getElementById("resposta5")

    if (resposta5.style.display != "block") {
        resposta5.style.display = "block"
    } else {
        resposta5.style.display = "none"
    }

})

button.addEventListener("click", function () {

    var resposta6 = document.getElementById("resposta6")

    if (resposta6.style.display != "block") {
        resposta6.style.display = "block"
    } else {
        resposta6.style.display = "none"
    }

})

button.addEventListener("click", function () {

    var resposta7 = document.getElementById("resposta7")

    if (resposta7.style.display != "block") {
        resposta7.style.display = "block"
    } else {
        resposta7.style.display = "none"
    }

})
*/

const msgAlerta = document.getElementById("msgAlerta")
const editForm = document.getElementById("edit-questoes-form")
const msgAlertaErroEdit = document.getElementById("msgAlertaErroEdit")


async function editQuestao(id) {
    msgAlertaErroEdit.innerHTML = "";

    const dados = await fetch('visualizar.php?id=' + id);
    const resposta = await dados.json();
    console.log(resposta);

    if (resposta['erro']) {
        msgAlerta.innerHTML = resposta['msg'];
    } else {
        const editModal = new bootstrap.Modal(document.getElementById("editQuestoesModal"));
        editModal.show();
        document.getElementById("editid").value = resposta['dados'].id;
        document.getElementById("editquestao").value = resposta['dados'].questao;
        document.getElementById("editalternativa_a").value = resposta['dados'].alternativa_a;
        document.getElementById("editalternativa_b").value = resposta['dados'].alternativa_b;
        document.getElementById("editalternativa_c").value = resposta['dados'].alternativa_c;
        document.getElementById("editalternativa_d").value = resposta['dados'].alternativa_d;
        document.getElementById("editresposta").value = resposta['dados'].resposta;
    }
}

editForm.addEventListener("submit", async (e) => {
    e.preventDefault()

    const dadosForm = new FormData(editForm)
    console.log(dadosForm)

    const dados = await fetch("editar.php", {
        method: "POST",
        body: dadosForm
    })

    const resposta = await dados.json()
    console.log(resposta)

    if (resposta['erro']) {
        msgAlertaErroEdit.innerHTML = resposta['msg']
    } else {
        msgAlertaErroEdit.innerHTML = resposta['msg']


    }
})