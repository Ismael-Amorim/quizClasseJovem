const editForm = document.getElementById("enviar_mensagem")


async function reload() {

    //location.reload(300)
}

var div = document.getElementById('chat');
div.scrollTop = div.scrollHeight; // Rolagem automática para o final


(async () => {
    const button = document.getElementById('cadMsg')

    let granted = false

    if (Notification.permission === 'granted') {
        granted = true
    }

    if (Notification.permission !== 'denied') {
        const permission = await Notification.requestPermission()

        granted = permission === 'granted' ? true : false
    }

    if (!granted) {
        document.querySelector('#erro').innerHTML = "Usuário negou notificações!"
    } else {
        document.querySelector('#erro').style.display = 'none'

    }

    button.addEventListener('click', () => {
        if (granted) {
            const noitification = new Notification('Chat Classe Jovem', {
                body: 'Nova mensagem recebida!',
                vibrate: [300],
                icon: 'msg.png'
            })

            console.log(noitification)

            noitification.addEventListener('click', () => {
                window.open('chat.php')
            })
        }
    })

})()