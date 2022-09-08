# News page
This project is using `https://newsapi.org/` to show users trending news in different categories in US.
![Alt text](previews/home.png?raw=true "Title")

In this page it is also possible to add articles, which are stored in MySQL database.
![Alt text](previews/add-article.png?raw=true "Title")

There is a specific category "User Added Articles", which, if empty, displays message; otherwise it shows all user added articles.
![Alt text](previews/no-posts.png?raw=true "Title")

Project is built implementing MVC pattern and OOP paradigm, and created in PHP 7.4.

#### Requirements
- all composer requirements are in `composer.json` file;
- visit `https://newsapi.org/register` to sign up and get API key;
- create `.env` file and input all the necessary data (see `.example.env` file)

#### Running the app

- Run the site using built-in web server `php -S localhost:port`
