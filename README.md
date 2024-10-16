# <div align="center"> <img src="https://github.com/SzymCode/DataManager/assets/107359025/652cd065-7449-4e9a-9564-3916fa3baedc" width="70"> <br> DataManager <br> </div>
<br>

This website helps to storage various data types and share it with others. My target is to create fully responsive, functional and scalable [ERP](https://en.wikipedia.org/wiki/Enterprise_resource_planning)-like website based on [RWD](https://en.wikipedia.org/wiki/Responsive_web_design), [MFD](https://medium.com/@Vincentxia77/what-is-mobile-first-design-why-its-important-how-to-make-it-7d3cf2e29d00), [BDD](https://en.wikipedia.org/wiki/Behavior-driven_development) and [FDD](https://en.wikipedia.org/wiki/Feature-driven_development) principles. Serves as my coding sandbox, where I can experiment with different coding techniques, implement new features, and refine my skills.

<b>Join my project and become part of building something incredible!</b>

<br><a href="https://data-manager.szymco.de">Live preview</a><br><br>

<details><summary> <h2> &nbsp; <img src="https://upload.wikimedia.org/wikipedia/commons/d/dc/XAMPP_Logo.png" height=25/> &nbsp; XAMPP </h2> </summary> <br>
<details><summary> 🛠️ Installation </summary>

- First make sure u have installed latest versions of [PHP](https://www.php.net), [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org/), [Node.js](https://nodejs.org/en), [npm](https://www.npmjs.com), [XAMPP](https://www.apachefriends.org/pl/index.html) and [Composer](https://getcomposer.org/)

- I recommend use [nvm](https://github.com/nvm-sh/nvm/blob/master/README.md) for install latest supported versions of [Node.js](https://nodejs.org/en) and [npm](https://www.npmjs.com),

```
nvm use --lts
```

- Clone this repository

```
git clone https://github.com/SzymCode/DataManager.git
```

- Change *.env.example* file to *.env* in root directory

- Generate APP_KEY

```
php artisan key:generate
```

- Install modules in root directory

```bash
npm install
composer update

# if you want use storybook
cd storybook
npm install
```

### **Make sure u have installed all modules!**

- run XAMPP mysql server and create database
```bash
mysql -u root -p
create database datamanager
create database datamanager_test    # it's not necessary, only for tests
```

<br></details>

<details><summary> 🚀 Run </summary><br>

Root directory:

```bash
npm run dev
php artisan serve
```

<br></details>

<details><summary> ❓ Usage </summary><br>
<details><summary> Migrations </summary><br>

```bash
php artisan migrate:fresh --seed

# Reset database by dropping all tables and then run all migrations
# --seed flag runs the database seeders after the migrations
```

<br/></details>

<details><summary> Factories </summary><br>

```bash
php artisan tinker

# if you wish, you can specify count in factory() or attributes in create()
Article::factory(100)->create();
Contact::factory(100)->create();
User::factory(100)->create();

# for Spatie Activity model
Database\Factories\ActivityFactory::new()->count(100)->create();
```

<br/></details>

<details><summary> Tests </summary><br>

<img src="https://github.com/SzymCode/SzymCode/assets/107359025/ced20949-7b32-407b-a249-2dd9b117f5b2" height="15" /> &nbsp;Pest tests:
```bash
# run all tests
./vendor/bin/pest

# or specify group
./vendor/bin/pest --group=api

# defined tests groups:
api, activity-api, article-api, artisan-api, contact-api, sitemap-api, user-api,
database, feature, global, unit, commands, controllers, services, factories, migrations, models

# run all tests and check code coverage
./vendor/bin/pest --coverage
```
![Tests](https://github.com/user-attachments/assets/560df303-07c7-42f0-a178-07ef5e05a8a8)![Coverage](https://github.com/user-attachments/assets/0b6cc696-8fdb-469f-a78c-e6faaadbe437)

<img src="https://static-00.iconduck.com/assets.00/cypress-icon-512x511-29zvfts6.png" height="15" /> &nbsp;Cypress tests:
```bash
npm run open
```

<img src="https://vitest.dev/logo-shadow.svg" height="15" /> &nbsp;Vitest tests:
```bash
npm run test
```

<img src="https://icons.veryicon.com/png/o/business/vscode-program-item-icon/storybook.png" height="15" /> &nbsp;Storybook:
```bash
cd storybook
yarn storybook
```

<br></details>

<details><summary> npm </summary><br>

1. Npm clean install - ```npm ci```
4. Vite build - ```npm run build```
5. Eslint fix - ```npm run lint```
6. Run prettier - ```npm run write```
7. Husky install - ```npm run prepare```

<br></details>

<details><summary> Sitemaps </summary><br>

Generate XML sitemap

```bash
php artisan sitemap:generate
```

</details></details><hr><br></details></details>




<details><summary> <h2> &nbsp; <img src="https://cdn4.iconfinder.com/data/icons/logos-and-brands/512/97_Docker_logo_logos-512.png" height=25/> &nbsp; Docker </h2> </summary> <br>
<details><summary> 🛠️ Installation </summary> <br>

- First make sure u have installed latest versions of [PHP](https://www.php.net), [Laravel](https://laravel.com/), [Vue.js](https://vuejs.org/), [Node.js](https://nodejs.org/en), [npm](https://www.npmjs.com), [Composer](https://getcomposer.org/) and [Docker](https://www.docker.com)

- I recommend use [nvm](https://github.com/nvm-sh/nvm/blob/master/README.md) for install latest supported versions of [Node.js](https://nodejs.org/en) and [npm](https://www.npmjs.com),

```
nvm use --lts
```

- Clone this repository

```
git clone https://github.com/SzymCode/DataManager.git
```

- Change .env.example file to .env in root directory

- Generate APP_KEY

```
php artisan key:generate
```

- Install modules in root directory

```bash
composer update
php artisan sail:install
sail npm install

# if you want use storybook
cd storybook
npm install
```

### **Make sure u have installed all modules!**

<br>

Possible problems:
- Error: EACCES: permission denied, mkdir '/var/www/html/node_modules': ```sudo chmod 777 -R DataManager``` or [Solution](https://stackoverflow.com/questions/49679808/error-eacces-permission-denied-mkdir-usr-local-lib-node-modules-node-sass-b)

<br></details>

<details><summary> 🚀 Run </summary> <br>

Root directory:

```bash
# run Docker containers in the background
sail start

# run command inside laravel.test container bash
sail npm run dev
```

**Remember to shutdown all XAMPP processes!**

Possible problems:
- Sail: no such file or directory found: [Solution 1](https://laravel.com/docs/10.x/sail#configuring-a-shell-alias), [Solution 2](https://stackoverflow.com/questions/71503871/laravel-error-laravel-sail-no-such-file-or-directory-found)
- Error starting userland proxy: listen tcp4 0.0.0.0:3306: bind: address already in use: ```sudo service mysql stop```

<br></details>

<details><summary> ❓ Usage </summary><br>

<details><summary> Migrations </summary><br>

```bash
sail artisan migrate:fresh --seed

# Reset database by dropping all tables and then run all migrations
# --seed flag runs the database seeders after the migrations
```

<br/></details>

<details><summary> Factories </summary><br>

```bash
sail tinker

# if you wish, you can specify count in factory() or attributes in create()
Article::factory(100)->create();
Contact::factory(100)->create();
User::factory(100)->create();

# for Spatie Activity model
Database\Factories\ActivityFactory::new()->count(100)->create();
```

<br/></details>

<details><summary> Tests </summary><br>

<img src="https://github.com/SzymCode/SzymCode/assets/107359025/ced20949-7b32-407b-a249-2dd9b117f5b2" height="15" /> &nbsp;Pest tests:
```bash
# run all tests
sail pest

# or specify group
sail pest --group=api

# defined tests groups:
api, activity-api, article-api, artisan-api, contact-api, sitemap-api, user-api,
database, feature, global, unit, commands, controllers, services, factories, migrations, models

# run all tests and check code coverage
sail pest --coverage
```

![Tests](https://github.com/user-attachments/assets/560df303-07c7-42f0-a178-07ef5e05a8a8)![Coverage](https://github.com/user-attachments/assets/0b6cc696-8fdb-469f-a78c-e6faaadbe437)



<img src="https://static-00.iconduck.com/assets.00/cypress-icon-512x511-29zvfts6.png" height="15" /> &nbsp;Cypress tests:
```bash
npm run open  # For now I've not configured Cypress with Docker
```

<img src="https://vitest.dev/logo-shadow.svg" height="15" /> &nbsp;Vitest tests:
```bash
sail npm run test
```

<img src="https://icons.veryicon.com/png/o/business/vscode-program-item-icon/storybook.png" height="15" /> &nbsp;Storybook - visit ```localhost:6006``` after ```sail start```

<br></details>

<details><summary> npm </summary><br>

1. Npm clean install - ```sail npm ci```
4. Vite build - ```sail npm run build```
5. Eslint fix - ```sail npm run lint```
6. Run prettier - ```sail npm run write```
7. Husky install - ```sail npm run prepare```

<br></details>

<details><summary> Sitemaps </summary><br>

Generate XML sitemap

```bash
sail artisan sitemap:generate
```

</details></details><hr><br></details></details>

<details><summary> <h2> &nbsp; 🛠️ &nbsp; Tech Stack </h2> </summary> <br>
<div align="center">
  <img src="https://skillicons.dev/icons?i=php" height="35" />
  <img src="https://skillicons.dev/icons?i=ts" height="35" />
  <img src="https://skillicons.dev/icons?i=laravel" height="35" />
  <img src="https://skillicons.dev/icons?i=vue" height="35" />
  <img src="https://www.primefaces.org/wp-content/uploads/2019/12/primevue-logo.png" height="35" />
  <img src="https://skillicons.dev/icons?i=html" height="35" />
  <img src="https://skillicons.dev/icons?i=sass" height="35" />
  <img src="https://skillicons.dev/icons?i=mysql" height="35" />
  <img src="https://skillicons.dev/icons?i=docker" height="35" />
  <img src="https://skillicons.dev/icons?i=heroku" height="35" />
  <img src="https://skillicons.dev/icons?i=vite" height="35" />
  <img src="https://skillicons.dev/icons?i=vitest" height="35" />
  <img src="https://github.com/SzymCode/SzymCode/assets/107359025/ced20949-7b32-407b-a249-2dd9b117f5b2" height="33" />
  <img src="https://icons.veryicon.com/png/o/business/vscode-program-item-icon/storybook.png" height="35" />
  <img src="https://static-00.iconduck.com/assets.00/cypress-icon-512x511-29zvfts6.png" height="35" />
  <img src="https://github.com/user-attachments/assets/06bebfc4-9927-45d6-ac7b-75ced6e85501" height="35" />
  <img src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/eslint/eslint-original.svg" height="35" />
  <img src="https://github.com/SzymCode/SzymCode/assets/107359025/a983a634-3e81-4a11-9281-0ef0bacfd187" height="35" />
  <img src="https://github.com/SzymCode/SzymCode/assets/107359025/712ed3a9-e9fa-4782-acff-140a4970ba88" height="35" />
</div>
<hr><br></details>

<details><summary> <h2> &nbsp; <img src="https://static-00.iconduck.com/assets.00/github-icon-2048x2048-823jqxdr.png" width="25"> &nbsp; Contribute </h2> </summary> <br>

Feel free to check [Project](https://github.com/users/SzymCode/projects/2) and [Issues](https://github.com/SzymCode/DataManager/issues) sections. <br>
Your skills and expertise will directly contribute to the success of our project, helping us achieve our goals and create an attractive portfolio.

<br></details>

