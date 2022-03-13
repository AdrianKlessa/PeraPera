# PeraPera
(Polish) Strona PHP dla nieistniejącej szkoły językowej (projekt z technikum)

Strona zawiera:
  -CSS
  -działający system logowania, wylogowania
  -dezynfekcję danych wprowadzanych przez użytkownika (ochrona przed SQL Injection)
  -menu, footer wykorzystujące funkcję PHP include
  -mapę wygenerowaną przy pomocy API Google
  -podstrony dla obcokrajowców po japońsku i angielsku
  -przycisk "zaloguj" zmienia się na "zalogowany:w <nazwa konta>" jeśli użytkownik jest zalogowany
  -funkcję "przypomnij hasło", która (choć nie perfekcyjnie - nie generuje nowego, losowego hasła tylko wysyła to przypisane do konta) działałaby
    po uprzedniej konfiguracji serwera mailowego - wysyłanie maili programistycznie jest trudniejsze niż myślałem - Google nie chce żeby ich serwis był wykorzystywany przez boty
  -przekierowanie po zalgowaniu do panelu administracyjnego kont o odpowiednim typie (poziomie uprawnień);
    reszta użytkowników zostaje przekierowana na normalną stronę użytkownika
  -System rejestracji sprawdzający poprawność wpisanych danych (długość pseudonimu, znaki w nim, znaki w mailu, potwierdzenie poprawności hasła, długość hasła)
  -Zapamiętywanie danych w formularzu rejestracyjnym na wypadek błędów (nie trzeba wpisywać wszystkiego ponownie jeśli tylko jedno pole jest niepoprawne)
  -System CAPTCHA używający API dostarczonego przez Google (słynne "czy jesteś robotem?")
  -hashowanie haseł funkcją Bcrypt
  -funkcja zmiany hasła na stronie domowej użytkownika
  
  Od stworzenia tego projektu minęły ok. 4 lata i mam świadomość tego, iż wiele rzeczy zrobiłbym teraz zupełnie inaczej.

  Przykładowe screeny:
  
  <img src="https://raw.githubusercontent.com/AdrianKlessa/PeraPera/main/screen1.PNG" width="800" height="800" />
  
  <img src="https://raw.githubusercontent.com/AdrianKlessa/PeraPera/main/screen2.PNG" width="800" height="800" />
