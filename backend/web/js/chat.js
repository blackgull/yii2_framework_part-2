window.onload = function () {

    const websocketPort = wsPort ? wsPort : 8080;
    let conn = new WebSocket('ws://localhost:' + websocketPort);
    let idMessage = 'chatMessage';

    conn.onopen = function (e) {
        console.log("Connection established!");
    };

    conn.onerror = function (e) {
        console.log("Connection fail!");
    };

    conn.onmessage = function (e) {
        console.log(e.data);
        document.getElementById(idMessage).value = e.data + '\n' + document.getElementById(idMessage).value;
        renderMessage(e.data);
        resetForm();
    };

    /**
     * Функция отправки сообщения
     * @type {HTMLElement}
     */
    let btnSend = document.getElementById('sendMessage');
    btnSend.addEventListener('click', function (e) {
        e.preventDefault();
        let message = document.getElementById(idMessage).value;
        if (message.trim() !== '') {
            conn.send(message);
            renderMessage(message);
        }
        resetForm();
    });

    /**
     * Функция рендерит сообщение в чат
     * @param message
     */
    function renderMessage(message) {
        let $el = $('li.messages-menu ul.menu li:first').clone();
        $el.find('p').text(message);
        $el.find('h4').text('Websocket user');
        $el.prependTo('li.messages-menu ul.menu');

        let cnt = $('li.messages-menu ul.menu li').length;
        $('li.messages-menu span.label-success').text(cnt);
        $('li.messages-menu li.header').text('You have ' + cnt + ' messages');
    }

    /**
     * Функция очищает поля формы
     */
    function resetForm() {
        document.getElementById('chatForm').reset();
    }
};