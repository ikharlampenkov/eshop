<?php
/**
 * Created by JetBrains PhpStorm.
 * User: Administrator
 * Date: 04.05.12
 * Time: 16:28
 * To change this template use File | Settings | File Templates.
 */
class anketa
{
    protected $_order;

    public function __construct()
    {
        $this->_order = new Order();
    }


    public function _sendToEmail($data)
    {

        if (isset($data['sms'])) {
            $data['sms'] = 'Да';
        } else {
            $data['sms'] = 'Нет';
        }

        if (isset($data['spam'])) {
            $data['spam'] = 'Да';
        } else {
            $data['spam'] = 'Нет';
        }

        if (isset($data['unique'])) {
            $data['unique'] = 'Да';
        } else {
            $data['unique'] = 'Нет';
        }


        $message = 'Регистрация нового пользователя: ' . "\r\n";
        $message .= 'Дата: ' . date('d.m.Y') . "\r\n" . "\r\n";


        $message .=
                'Фамилия: ' . $data['lname'] . "\r\n" .
                        'Имя: ' . $data['fname'] . "\r\n" .
                        'Отчество: ' . $data['sname'] . "\r\n" .

                        'Дата рождения: ' . $data['bd'] . '.' . $data['bm'] . '.' . $data['by'] . "\r\n" .
                        'Паспорт: серия: ' . $data['pseria'] . ' номер: ' . $data['pnumber'] . "\r\n" .
                        'Адрес, улица, дом: ' . $data['address1'] . "\r\n" .
                        'Город: ' . $data['city1'] . "\r\n" .
                        'Почтовый индекс: ' . $data['index1'] . "\r\n" .
                        'Страна: ' . $data['country1'] . "\r\n" .
                        'Область: ' . $data['region1'] . "\r\n" .
                        'Телефон домашний: ' . $data['telefon1_1'] . '-' . $data['telefon1_2'] . '-' . $data['telefon1_3'] . "\r\n" .
                        'Телефон мобильный: ' . $data['telefon2_1'] . '-' . $data['telefon2_2'] . '-' . $data['telefon2_3'] . '-' . $data['telefon2_4'] . "\r\n" .
                        'E-mail: ' . $data['email'] . "\r\n" .
                        'Контрольный вопрос: ' . $data['question'] . "\r\n" .
                        'Ответ на контрольный вопрос: ' . $data['answer'] . "\r\n" .

                        'Пароль: ' . $data['password1'] . "\r\n" .
                        'Подтвердите пароль: ' . $data['password2'] . "\r\n" .
                        'Номер контракта спонсора: ' . $data['sponsor'] . "\r\n" .
                        'SMS: ' . $data['sms'] . "\r\n" .
                        'Я согласен получать рекламную информацию: ' . $data['spam'] . "\r\n" .
                        'Я подтверждаю, что у меня нет другого номера Контракта: ' . $data['unique'] . "\r\n" . "\r\n";


        $email = $this->_order->getEmail();

        $header = 'From: order@тиандемагазин.рф';
        if (!empty($email)) {
            mail($email, 'Регистрация нового пользователя', mb_convert_encoding($message, 'windows-1251', 'UTF-8'), $header);
        }

    }

}
