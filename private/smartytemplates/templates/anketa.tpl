<h1>Регистрация</h1>

{if isset($isComplite)}
<div>Анкета отправлена</div><br/><br/>
{/if}

<p class="error"><b>Все поля анкеты отмеченные * являются обязательными для заполнения.</b></p>

<form method="post" action="?page=anketa">

<p class="error hidden">Повторная регистрация запрещена</p>

<p class="error hidden">Этот электронный адрес уже занят</p>

<p class="error hidden">Укажите правильный электронный адрес</p>

<p class="error hidden">Укажите электронный ардес или выберите контрольный вопрос и укажите ответ на него</p>

<p class="error hidden">К сожалению, почтовый сервер Rambler работает некорректно. Укажите другой электронный адрес почтового ящика.</p>

<p class="error hidden">Укажите имя</p>

<p class="error hidden">Укажите отчество</p>

<p class="error hidden">Укажите фамилию</p>

<p class="error hidden">Укажите серию паспорта - 4 цифры</p>

<p class="error hidden">Укажите номер паспотра - 6 цифр</p>

<p class="error hidden">Укажите правильно дату рождения</p>

<p class="error hidden">Укажите страну</p>

<p class="error hidden">Укажите регион</p>

<p class="error hidden">Укажите город</p>

<p class="error hidden">Укажите индекс</p>

<p class="error hidden">Укажите адрес</p>

<p class="error hidden">Укажите регион доставки</p>

<p class="error hidden">Укажите город доставки</p>

<p class="error hidden">Укажите индекс доставки</p>

<p class="error hidden">Укажите адрес, по которому будет выслан &laquo;Стартовый пакет дистрибьютора&raquo;</p>

<p class="error hidden">Укажите как минимум один телефон</p>

<p class="error hidden">Укажите правильно представительство</p>

<p class="error hidden">Укажите пароль</p>

<p class="error hidden">Пароль и подтверждение пароля не совпадают</p>

<p class="error hidden">Укажите мобильный телефон для получения новостей от компании TianDe в виде SMS-сообщений</p>

<p class="error hidden">Укажите правильный электронный адрес для получения рекламной информации</p>

<p class="error hidden">Повторная регистрация невозможна</p>

<table class="anketafree" width="580" cellpadding="0" cellspacing="0" border="0">
<tr>
    <th colspan="3">
        Данные дистрибьютора
    </th>
</tr>
<tr>
    <td valign="bottom" width="33%">
        <span class="red">*</span>Фамилия:<br/>
        <input type=text name=lname value="" style="width: 100%;"/>
    </td valign="bottom">
    <td valign="bottom" width="33%">
        <span class="red">*</span>Имя:<br/>
        <input type=text name=fname value="" style="width: 100%;"/>
    </td>
    <td valign="bottom">
        Отчество:<br/>
        <input type=text name=sname value="" style="width: 100%;"/>
    </td>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Дата рождения:<br/>
        <select name=bd>
            <option selected>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
            <option>9</option>
            <option>10</option>
            <option>11</option>
            <option>12</option>
            <option>13</option>
            <option>14</option>
            <option>15</option>
            <option>16</option>
            <option>17</option>
            <option>18</option>
            <option>19</option>
            <option>20</option>
            <option>21</option>
            <option>22</option>
            <option>23</option>
            <option>24</option>
            <option>25</option>
            <option>26</option>
            <option>27</option>
            <option>28</option>
            <option>29</option>
            <option>30</option>
            <option>31</option>
        </select> <select name=bm>
        <option selected>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        <option>5</option>
        <option>6</option>
        <option>7</option>
        <option>8</option>
        <option>9</option>
        <option>10</option>
        <option>11</option>
        <option>12</option>
    </select> <select name=by>
        <option>1900</option>
        <option>1901</option>
        <option>1902</option>
        <option>1903</option>
        <option>1904</option>
        <option>1905</option>
        <option>1906</option>
        <option>1907</option>
        <option>1908</option>
        <option>1909</option>
        <option>1910</option>
        <option>1911</option>
        <option>1912</option>
        <option>1913</option>
        <option>1914</option>
        <option>1915</option>
        <option>1916</option>
        <option>1917</option>
        <option>1918</option>
        <option>1919</option>
        <option>1920</option>
        <option>1921</option>
        <option>1922</option>
        <option>1923</option>
        <option>1924</option>
        <option>1925</option>
        <option>1926</option>
        <option>1927</option>
        <option>1928</option>
        <option>1929</option>
        <option>1930</option>
        <option>1931</option>
        <option>1932</option>
        <option>1933</option>
        <option>1934</option>
        <option>1935</option>
        <option>1936</option>
        <option>1937</option>
        <option>1938</option>
        <option>1939</option>
        <option>1940</option>
        <option>1941</option>
        <option>1942</option>
        <option>1943</option>
        <option>1944</option>
        <option>1945</option>
        <option>1946</option>
        <option>1947</option>
        <option>1948</option>
        <option>1949</option>
        <option>1950</option>
        <option>1951</option>
        <option>1952</option>
        <option>1953</option>
        <option>1954</option>
        <option>1955</option>
        <option>1956</option>
        <option>1957</option>
        <option>1958</option>
        <option>1959</option>
        <option>1960</option>
        <option>1961</option>
        <option>1962</option>
        <option>1963</option>
        <option>1964</option>
        <option>1965</option>
        <option>1966</option>
        <option>1967</option>
        <option>1968</option>
        <option>1969</option>
        <option selected>1970</option>
        <option>1971</option>
        <option>1972</option>
        <option>1973</option>
        <option>1974</option>
        <option>1975</option>
        <option>1976</option>
        <option>1977</option>
        <option>1978</option>
        <option>1979</option>
        <option>1980</option>
        <option>1981</option>
        <option>1982</option>
        <option>1983</option>
        <option>1984</option>
        <option>1985</option>
        <option>1986</option>
        <option>1987</option>
        <option>1988</option>
        <option>1989</option>
        <option>1990</option>
        <option>1991</option>
        <option>1992</option>
        <option>1993</option>
        <option>1994</option>
        <option>1995</option>
        <option>1996</option>
        <option>1997</option>
        <option>1998</option>
        <option>1999</option>
        <option>2000</option>
    </select>
    </td>
    <td valign="bottom" colspan="2">
        Паспорт:<br/>
        серия: <input type=text name=pseria value="" style="width: 50px"/>
        номер: <input type=text name=pnumber value=""/>
    </td>
</tr>
<tr>
    <td valign="botom" colspan="3">
        <span class="red">*</span>Адрес, улица, дом:<br/>
        <input type=text name="address1" id="address1" value="" style="width: 100%;"/>
    </td>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Город:<br/>
        <input type=text name="city1" id="city1" value="" style="width: 100%;"/>
    </td>
    <td valign="bottom">
        <span class="red">*</span>Почтовый индекс:<br/>
        <input type=text name="index1" id="index1" value="" style="width: 100%;"/>
    </td>
    <td valign="bottom">
        <span class="red">*</span>Страна:<br/>
        <select name="country1" style="width: 100%">
            <option></option>
            <option>Австралия</option>
            <option>Австрия</option>
            <option>Азербайджан</option>
            <option>Алжир</option>
            <option>Ангола</option>
            <option>Андорра</option>
            <option>Антигуа и Барбуда</option>
            <option>Аргентина</option>
            <option>Армения</option>
            <option>Аруба</option>
            <option>Бангладеш</option>
            <option>Барбадос</option>
            <option>Беларусь</option>
            <option>Бельгия</option>
            <option>Бенин</option>
            <option>Болгария</option>
            <option>Бразилия</option>
            <option>Бруней</option>
            <option>Ватикан</option>
            <option>Великобритания</option>
            <option>Венгрия</option>
            <option>Венесуэла</option>
            <option>Вьетнам</option>
            <option>Гаити</option>
            <option>Гваделупа</option>
            <option>Гватемала</option>
            <option>Гвинея</option>
            <option>Германия</option>
            <option>Гондурас</option>
            <option>Гонконг</option>
            <option>Гренада</option>
            <option>Греция</option>
            <option>Грузия</option>
            <option>Дания</option>
            <option>Доминиканская Респ-ка</option>
            <option>Египет</option>
            <option>Зимбабве</option>
            <option>Израиль</option>
            <option>Индия</option>
            <option>Индонезия</option>
            <option>Иордания</option>
            <option>Ирак</option>
            <option>Иран</option>
            <option>Ирландия</option>
            <option>Исландия</option>
            <option>Испания</option>
            <option>Италия</option>
            <option>Каймановы острова</option>
            <option>Казахстан</option>
            <option>Камбоджа</option>
            <option>Канада</option>
            <option>Канарские острова</option>
            <option>Катар</option>
            <option>Кения</option>
            <option>Кипр</option>
            <option>Китай</option>
            <option>Коста-Рика</option>
            <option>Куба</option>
            <option>Кыргызстан</option>
            <option>Лаос</option>
            <option>Латвия</option>
            <option>Литва</option>
            <option>Люксембург</option>
            <option>Маврикий</option>
            <option>Мадагаскар</option>
            <option>Малайзия</option>
            <option>Мальдивы</option>
            <option>Мальта</option>
            <option>Македония</option>
            <option>Марокко</option>
            <option>Мартиника</option>
            <option>Мексика</option>
            <option>Молдавия</option>
            <option>Монако</option>
            <option>Монголия</option>
            <option>Мьянма (Бирма)</option>
            <option>Намибия</option>
            <option>Непал</option>
            <option>Нидерланды</option>
            <option>Новая Зеландия</option>
            <option>Норвегия</option>
            <option>Объед. Арабские Эмираты</option>
            <option>Оман</option>
            <option>Панама</option>
            <option>Перу</option>
            <option>Польша</option>
            <option>Португалия</option>
            <option>Пуэрто-Рико</option>
            <option>Россия</option>
            <option>Румыния</option>
            <option>Сальвадор</option>
            <option>Сан-Марино</option>
            <option>Сейшельские острова</option>
            <option>Сенегал</option>
            <option>Сербия</option>
            <option>Сингапур</option>
            <option>Сирия</option>
            <option>Словакия</option>
            <option>Словения</option>
            <option>Соломоновы острова</option>
            <option>США</option>
            <option>Сьерра-Леоне</option>
            <option>Таджикистан</option>
            <option>Таиланд</option>
            <option>Тайвань</option>
            <option>Танзания</option>
            <option>Тринидад и Тобаго</option>
            <option>Тунис</option>
            <option>Турция</option>
            <option>Уганда</option>
            <option>Узбекистан</option>
            <option>Украина</option>
            <option>Уругвай</option>
            <option>Филиппины</option>
            <option>Финляндия</option>
            <option>Франция</option>
            <option>Хорватия</option>
            <option>Чад</option>
            <option>Черногория</option>
            <option>Чехия</option>
            <option>Чили</option>
            <option>Швейцария</option>
            <option>Швеция</option>
            <option>Шри-Ланка</option>
            <option>Эквадор</option>
            <option>Эстония</option>
            <option>Юж. Корея</option>
            <option>ЮАР</option>
            <option>Ямайка</option>
            <option>Япония</option>
        </select>

    </td>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Область:<br/>
        <input type=text name="region1" id="region1" value="" style="width: 100%;"/>
    </td>
    <td valign="bottom">
        <span class="red">*</span>Телефон домашний:<br/>
        <small>(пример: +7 495 771-06-49),<br/>
            код страны, код города, номер телефона
        </small>
        <br/>
        <input type=text name="telefon1_1" value="" style="width: 25px"/>
        <input type=text name="telefon1_2" value="" style="width: 35px"/>
        <input type=text name="telefon1_3" value="" style="width: 80px"/>
    </td>
    <td valign="bottom">
        <span class="red">*</span>Телефон мобильный:<br/>
        <small>(пример: +7-913-245-1440)</small>
        <br/>
        <input type=text id="telefon2_1" name="telefon2_1" value="" style="width: 25px"/>
        <input type=text id="telefon2_2" name="telefon2_2" value="" style="width: 35px"/>
        <input type=text id="telefon2_3" name="telefon2_3" value="" style="width: 35px"/>
        <input type=text id="telefon2_4" name="telefon2_4" value="" style="width: 35px"/>
    </td>
</tr>
<tr>
    <td colspan="3">
        <span class="red">*</span>-необходимо указать либо e-mail, либо контрольный вопрос
    </td>
</tr>
<tr>
    <td valign="bottom">
        E-mail:<br/>
        <input type="text" id="email" name="email" value="" style="width: 100%;"/>
    </td>
</tr>
<tr>
    <td>
        Контрольный вопрос<br/>
        <select name="question">
            <option value="0">Выберите контрольный вопрос</option>
            <option value="1">Девичья фамилия матери</option>
            <option value="2">Любимое блюдо</option>
            <option value="3">Город мечты</option>
            <option value="4">Произвольный ответ</option>
        </select>
    </td>
    <td colspan="2">
        Ответ на контрольный вопрос<br/>
        <input type="text" name="answer" value="">
    </td>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Пароль:<br/>
        <input type=password id=password1 name=password1 value="" style="width: 100%;"/>
    </td>
    <td valign="bottom" colspan="2">
        <small>Ваш пароль, придумайте и запомните его самостоятельно, по этому паролю Вы будете входить в свой Личный кабинет (Online office)</small>
    </td>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Подтвердите пароль:<br/>
        <input type=password id=password2 name=password2 value="" style="width: 100%;"/>
    </td>
</tr>

<tr class="hidden">
    <td valign="bottom">
        Представительство:<br/>
        <input type="text" name="group" id="group" value="" autocomplete="off" style="width: 100%;"/><br/>
        <span id="groups" class="hidden"></span>
    </td>
    <td valign="bottom" colspan="2">
        <small>Введите город или фамилию руководителя представительства</small>
    </td>
</tr>

<tr>
    <th colspan="3">
        <u>Данные спонсора</u>
    </th>
</tr>
<tr>
    <td valign="bottom">
        <span class="red">*</span>Номер контракта спонсора:
    </td>
</tr>
<tr>
    <td valign="bottom" colspan="3">
        <small>Номер контракта Вашего спонсора в компании <span class="red">(Без впередистоящих нолей)</span></small>
    </td>
</tr>
<tr>
    <td>
        <input type=text name="sponsor" id="sponsor1" value="" style="width: 100%;"
               onchange="document.getElementById('checkboxsponsor').disabled = true;"/>
    </td>
</tr>

<tr>
    <td colspan="2">
        <input class="anket-btn" type="button" name="check" value="Проверить номер" onClick="checkSponsor(); return false;">
    </td>
</tr>
<tr>
    <td colspan="3" valign="bottom">
        <input type="text" name="sponsor_fio" id="sponsor_fio" value="Ваш спонсор: не указан"
               style="border:0;width: 100%;font-size: 130%;font-style:italic;font-weight: bold;"
               readonly nofocus/>
    </td>
</tr>
<tr>
    <td colspan="2">
        <div id="box">
            <input type="checkbox" name="checkboxsponsor" value="0" id="checkboxsponsor" onClick="agreeSubmit(this)" disabled>
            <label for="checkboxsponsor">Спонсор указан верно</label>
        </div>
    </td>
</tr>
</table>


<p class="hidden">
    <input type="checkbox" name="checkboxaddress2" value="1" id="checkboxaddress2" onClick="
            var divaddress2 = document.getElementById('divaddress2');
            if(!this.checked)
    {
    divaddress2.className = 'hidden';
    document.getElementById('region2').value = document.getElementById('region1').value;
    document.getElementById('city2').value = document.getElementById('city1').value;
    document.getElementById('index2').value = document.getElementById('index1').value;
    document.getElementById('address2').value = document.getElementById('address1').value;
    }
            else
    {
    divaddress2.className = '';
    document.getElementById('region2').value = '';
    document.getElementById('city2').value = '';
    document.getElementById('index2').value = '';
    document.getElementById('address2').value = '';
    }
            "/>
    <label for="checkboxaddress2">Выслать "Стартовый набор дистрибьютора" по другому адресу</label>
</p>

<div id="divaddress2" class="hidden">
    <p>
        Область:<br/>
        <input type=text name="region2" id="region2" value=""/>
    </p>

    <p>
        Город:<br/>
        <input type=text name="city2" id="city2" value=""/>
    </p>

    <p>
        Индекс:<br/>
        <input type=text name="index2" id="index2" value=""/>
    </p>

    <p>
        Адрес отправки "Стартового набора дистрибьютора":<br/>
        <input type=text name="address2" id="address2" value="" style="width: 500px;"/>
    </p>
</div>
<p>
    <input type="checkbox" name="sms" value="1" id="sms"/>
    <label for="sms">Я согласен получать новости в виде SMS-сообщений</label>
    на телефонный номер <input type="hidden" id="smsphone" name="smsphone" style="border:0;" value="" readonly/>
</p>

<p>

<p>
    <input type="checkbox" name="spam" value="1" id="spam"/>
    <label for="spam">Я согласен получать рекламную информацию</label>
    на указанный электронный адрес <input type="hidden" id="spamemail" name="spamemail" style="border:0;" value="" readonly/>
</p>

<p>
    <input type="checkbox" name="unique" value="1" id="unique"/>
    <label for="unique"><span class="red">*</span>Я подтверждаю, что у меня нет другого номера Контракта</label>
</p>

<p>
    <input class="anket-btn" type="submit" name="confirm" id="confirm" value="ОК" disabled="disabled"/>
</p>
</form>

<script type="text/javascript">

</script>