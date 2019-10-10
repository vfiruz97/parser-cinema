**Задание подготовить 2 url'a, используя фреймворк Laravel**

Данные брать с сайта https://cityopen.ru/afisha/kinoteatr-salavat/ расписание
любого кинотеатра (пример - Сегодня в Стерлитамаке:) или новости, разбирать данные и заносить их в БД, как
======================================
Дата (Y.m.d) | Название фильма | Цена
======================================
Всё это автоматически, т.е. при вводе урла http://example.com/update
данные сами забирались со страницы расписания и заносились в БД.
Если нужно можно добавлять свои столбцы в структуру БД, типы полей тоже на свой вкус.

Второй урл, например, http://example.com/get, будет отображать данные из таблицы БД в таблицу на странице.
Также сюда надо добавить фильтр - по каким параметрам отображать данные - так же на свой вкус.
При выполнении для оформления страницы следует использовать фреймворк Bootstrap

Примерный план выполнения:
1. Установить Laravel на локальный сервер.
2. Настроить соединение с БД.
3. Создать контроллер и представление.
4. Настроить роуты
5. Написать парсер расписания с заполнением в БД
6. Написать представление для отображения результата запроса к своей БД
7. Создать форму для фильтра и обработать отправку формы и вывод в зависимости от передаваемых параметров
