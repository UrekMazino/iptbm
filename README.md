```

```

![RTMS.png](assets/RTMS.png?t=1710906634145)

## **System Specification**

* Laravel 10^ framework
* livewire v 2
* Tailwind CSS Library
* Mysql database
* php v 8.1

**Installation Guide**

* Upload the zip files or clone the repository to the server.
* On the terminal, run the following command;
  * composer update
  * php artisan storage:link
  * npm install
  * npm run dev
* memory allocation should not be less than 200MB. I use 500MB to run this application.
* configure the .env file;
  * APP_URL
  * All database details,
  * all in Mail_Mailer
    * I am using a password app to connect to Gmail.
    * The password app is a security feature provided by Gmail, accessible exclusively when 2-step verification is enabled.
* Set up the cron jobs for IP Alert
  * the file containing the command found on "app/Console/Kernel.php
  * The system is a process control system for queues, so we have to install a Supervisor to handle the queued jobs using "queue:work" command.
* Upload the database.
*

**Additional**

* If there is a problem with file accessibility, try to change the folder permission to 755.

#### System development manual

* We use 2 guards, web for Users and admin for Admin Users.
* Users and Admin have different pages per component. (IPTBM, ABH).
* We have to authentication files;
  * auth.php for users
  * IptbmAdminAuth.php for Admin
* Livewire handled all post requests, and only get requests must be initialized on Routes, including middleware.
* On the IPTBM Module, we have used controllers based on the design of CVSU and livewire components to handle all the data processes.
* On the ABH module, we use livewire full-page rendering.
* Files uploaded to the system undergo a filename transformation, wherein they are hashed for security and privacy purposes.
* All validation can be found in "resources/views/livewire folder.
* Custom validation is found in the App/Rules folder.
* The "views/profile/" folder containing the user's profile settings.
* For Datatable please see this documentation [https://datatables.net/](https://)


Policies
