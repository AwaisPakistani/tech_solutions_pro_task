1. after cloning you've to run "composer install"
2. then run cp .env.example .env
3. Run php artisan migrate:fresh --seed
4. open superadmin credentials:
                  email : superadmin@gmail.com
                  password : superadmin
5. YOu can test the job uploading sales record behind administration tab
   . I'm using telescope for monitoring.
6. YOu have open "http://127.0.0.1:8000/telescope/jobs" after run command "php artisan serve" to monitor job. 
7. Run php artisan queue:work
8. I'm attaching the file of Sales record of excel file to upload for test named "sales" in main directory.
