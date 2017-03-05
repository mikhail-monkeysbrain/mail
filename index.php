<HTML>
<HEAD>
<TITLE>Отправка сообщения с вложением</TITLE>
</HEAD>
<BODY>
<form action=simple_mail.php enctype='multipart/form-data' method=post>
    <h2>Вызов замерщика</h2>
    <p>* Обязательно для заполнения</p>
    <h3>Заказчик</h3>
    <p>Название организации / ФИО</p><input type="text" name="name" required/><br/>
    <p>Адрес организации</p><input type="text" name="adres" required/><br/>
    <h3>Контактное лицо (менеджер)</h3>
    <p>ФИО</p><input type="text" name="fio" required/>*<br/>
    <p>Телефон</p><input type="text" name="phone" required/>*<br/>
    <p>E-mail</p><input type="text" name="email" required/>*<br/>
    <input type="text" name="emailLite"/><br/>
    <h3>Объект замера</h3>
    <p>Номер договора</p><input type="text" name="number"/><br/>
    <p>ФИО Клиента</p><input type="text" name="fioclient" required/>*<br/>
    <p>Телефон Клиента</p><input type="text" name="phoneclient" required/>*<br/>
    <input type="text" name="phoneclientlite"/><br/>
    <p>Адресс Клиента</p><input type="text" name="adresclient"/><br/>
    <p>Примечание</p><input type="text" name="noteclient"/><br/>
    <p>Удобное время:<input type="date" name="date"/><br/>
    <p>Оплата замера: </p>
    <input type="radio" name="place" value="В студии" defualt> В студии<br/>
    <input type="radio" name="place" value="На месте клиентом"> На месте клиентом<br/>
    <input type=file name="mail_file">
    <input type=submit value='Отправить'>
</form>
</BODY>
</HTML>