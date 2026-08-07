1. after cloning you've to run "composer install"
2. then run cp .env.example .env
3. Run php artisan migrate:fresh --seed
4. open superadmin credentials:
                  email : superadmin@gmail.com
                  password : superadmin

                  email : admin@gmail.com
                  password : adminuser

                  email : editor@gmail.com
                  password : editoruser

5. YOu can test the job uploading sales record behind administration tab
   . I'm using telescope for monitoring.
6. YOu have open "http://127.0.0.1:8000/telescope/jobs" after run command "php artisan serve" to monitor job. 
7. Run php artisan queue:work
8. I'm attaching the file of Sales record of excel file to upload for test named "sales" in main directory.
9. And for authorization you can change roles permissions in roles table in edit.
10. Keep in mind , to make permissions work perfectly we have to make modules to give permissions. 

