<div align="center">

![PHP](https://img.shields.io/badge/PHP-%234F5B93.svg?style=for-the-badge&logo=php&logoColor=white)
![Typescript](https://img.shields.io/badge/TypeScript-007ACC?style=for-the-badge&logo=typescript&logoColor=white)\
![Laravel](https://img.shields.io/badge/laravel-%23FF2D20.svg?style=for-the-badge&logo=laravel&logoColor=white)
![Vue.js](https://img.shields.io/badge/vue.js-%234FC08D.svg?style=for-the-badge&logo=vue.js&logoColor=white)

</div>

# ContactBook

This website helps to storage contacts data and share it with others. It's second version of my [project](https://github.com/SzymCode/ContactBook-sandbox), now with completely other tech stack.


<details><summary> <h2>  🛠️ Installation & Setup  </summary>

- First make sure u have installed latest versions of [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org/), [XAMPP](https://www.apachefriends.org/pl/index.html) and [Composer](https://getcomposer.org/).

- Clone this repository.

```
git clone https://github.com/SzymCode/ContactBook.git
```

- Install modules in root directory.

```bash
npm install
composer update
```

### **Make sure u have installed all modules!**

- Change *.env.example* file to *.env* in root directory, run XAMPP mysql server and create database.
```bash
mysql -u root -p
create database contactbook
```

- Migrate and seed database.
```bash
php artisan migrate:fresh --seed
```

<br/>
</details>


<details><summary> <h2>  🚀 Run  </summary>

<br/>

- root directory:

```bash
npm run dev
php artisan serve
```

<br/>

</details>  



<details><summary> <h2>  ❓ Factories & Tests  </summary>

- Run factories to generate fake data:
```bash
php artisan tinker
User::factory()->count(100)->create();
Contact::factory()->count(100)->create();      
```

- Run tests:
```bash
./vendor/bin/pest 
```

<br/>

</details>
