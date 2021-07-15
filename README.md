<p align="center">
    <a href="https://github.com/yiisoft" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Test</h1>
    <br>
</p>


Clone repository
-------------------
~~~
git clone https://github.com/Matvey021292/smsClubTest.git
~~~


Install package
------------
~~~
composer install
~~~

Edit database settings connection 
------------
path - 'smsClubTest/config/db.php'
~~~
'dsn' => 'mysql:host=localhost;dbname=yii2basic',
'username' => 'root',
'password' => '',
~~~


Running Migrations
------------
~~~
./yii migrate/up
~~~

Start Yii server
------------
~~~
./yii serve
~~~

