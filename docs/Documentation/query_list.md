## BACKEND ACTIONS

regex list :

| country | regex |
|---------|-------|
| us and ca | `^\+1(?:\s\d{3}){2}\s\d{4}$` |
| uk | `^\+44\s7\d{3}\s\d{6}$` | 
| france | `^\+33\s\d\s\d{2}\s\d{2}\s\d{2}\s\d{2}$` |
| germany | `^\+49\s\d{2,4}\s\d{3,8}\s\d{0,4}$` |
| italy | `^\+39\s\d{2,4}\s\d{3,4}\s\d{3,4}$` |
| spain | `^\+34\s[6-9]\d{2}\s\d{3}\s\d{3}$` |
| india | `^\+91\s[6-9]\d{4}\s\d{5}$` |
| australia | `^\+61\s[2-478]\s\d{4}\s\d{4}$` |
| brazil | `^\+55\s\d{2}\s\d{4,5}\s\d{4}$` |
| japan | `^\+81\s\d{1,4}\s\d{2,4}\s\d{4}$` |
| china | `^\+86\s1\d{2}\s\d{4}\s\d{4}$` |
| generic (maybe implement ? ) | `^\+\d{1,3}(?:\s\d{2,4}){2,5}$` |




    HomeController ()
    -> getHome ()
    -> getBlog () //gets the blog, reviews, and contact
    -> getPopUp ()

    HomeModel () 
    -> getHome ()
    -> getBlog () (google reviews api??)
    -> 

    ActivitiesController()
    -> getAll ()
    -> getCategory (string category)
    -> getSpecificActivity (string activity)
    -> getPopUp ()

    CustomerController ()
    -> getLogin ()
    -> getRegistration ()
    -> getDashboard (int user-level)
    -> getPopUp ()



| ACTION NO    | ACTIONS                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |
|--------------|-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 0 (login)    | **getLogin ()** <br>check if the string is a number BUT doesnt start with 0 -> staff login (if staff login, check the first number of the id, if 1 = employee, 2 = manager, 3 = admin <br>if its not a number OR the number starts with 0 -> client : check if string contains '@' (check if its an email) <br><br>hash the password (as string, to string)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
| 0 (register) | **getRegistration ()** <br>if its from the form -> the database will create the user_id then set fname, lname, email, phone, and hashed(password) as string. <br>* all the strings should be in lowercase before sending them to the db. For the names, pass them through a **capitalize ()** method which will capitalize the first letter of the name + any letter comming after a dash(-) or a space<br> * the email should be all to lowercase <br>* the phone should be checked to be formatted with regex (check country code, then format through appropriate regex)  <br>if its from an manager or admin dashboard (dashboard where user_id starts with either 2 or 3), make the name go through the **capitalize ()** method before passing it to the database, take the level (it will be passed as an int correspongind to the enum value) and use it to create the start of the id. hash the password before sending it to the database |
| 1a           | **getDashboard () -> ReserveActivity ()** <br>get the activity id from the list of activities or the user input<br>if it is a package reserve the activities included in the package (i.e. small group 1 = weapon throwing (1h) + rage cage (1h)) one after the other in the time slot.<br>Return the reservation id on the confirmation page once the payment is made<br>Remember that the reservation id contains package-activity1-activity2-reservation id-activity order (1 or 2)<br>See DB rules documentation for the information on the parsing of the ids                                                                                                                                                                                                                                                                                                                                                                                  |
| 1b           | **getDashboard () -> CancelActivity ()** <br>get the reservation id and then delete every activity associated with it (you will need to parse the id : parse to get the reservation id (9 numbers) and find all the reservations associated with it (1, optional 2 if it is a package) and delete them from the database (we do not preserve the canceled reservations)                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                             |                                                                                                                                                                                                                                                                                                                              
| 1c           | **getDashboard () -> UpdateActivity ()** <br>
| 1d           |
| 1e           |
| 2a           |
| 2b           |
| 3a           |
| 4a           |
| 4b           |



## QUERIES FOR THE DATABASE


| ACTION NO    | QUERY                                                                                                                                                                                                                                                                                                                        |
|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| 0 (login)    | input_user.isNumber() ?<br>   hashed(input_password) == db.password where staff.user_id == input_username : <br>  hashed(input_password) == user.password where input_user == email <br> + before passing, check if (when the user is client), the string contains '@', else display error message : you must login with your email |
| 0 (register) | insert into user values (fname, lname, email, phone (if there), hashed(password) <br> + the user id will be autoincremented by the database <br> ++ it is impossible to create a staff through the register. Another staff needs to do it.                                                                         |
| 1a           | 
| 1b           |
| 1c           |
| 1d           |
| 1e           |
| 2a           |
| 2b           |
| 3a           | 
| 4a           | 
| 4b           |





