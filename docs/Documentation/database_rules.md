<!--@ash-a9236 2025-->

<!--VARIABLES-->
<style>
  :root {
    --text: #FFF4E2ff;
    --highlight: #FCAA58ff;
    --link: #FEC574ff;
  }
</style>

<span style="color: var(--text)">

# <span style="color: var(--highlight)">SDC DATABASE DOCUMENTATION 01
## <span style="color: var(--highlight)">TABLES

<br>
TABLE OF CONTENTS <br> <br>

[<span style="color: var(--link)">01 . . Introduction</span>](#introduction) <br>
[<span style="color: var(--link)">02 . . Stand Alone Tables</span>](#stand-alone) <br>
    &emsp; [<span style="color: var(--link)">01 . . GIFT_CARD</span>](#gift-card) <br>
    &emsp; [<span style="color: var(--link)">02 . . STAFF</span>](#staff) <br>
    &emsp; [<span style="color: var(--link)">03 . . LOCKER</span>](#locker) <br>
    &emsp; [<span style="color: var(--link)">04 . . LANGUAGE</span>](#language) <br>
    &emsp; [<span style="color: var(--link)">05 . . IMAGE</span>](#image) <br>
    &emsp; [<span style="color: var(--link)">06 . . ROOM</span>](#room) <br>
    &emsp; [<span style="color: var(--link)">07 . . ACTIVITY</span>](#activity) <br>
    &emsp; [<span style="color: var(--link)">08 . . PACKAGE</span>](#package) <br>
    &emsp; [<span style="color: var(--link)">09 . . TRANSACTION</span>](#transaction) <br>
[<span style="color: var(--link)">03 . . Connecting Tables</span>](#access-modifiers) <br>
    &emsp; [<span style="color: var(--link)">01 . . LOGGER</span>](#logger) <br>
    &emsp; [<span style="color: var(--link)">02 . . CONTAINS</span>](#contains) <br>
    &emsp; [<span style="color: var(--link)">03 . . MEMBERSHIP</span>](#membership) <br>
    &emsp; [<span style="color: var(--link)">04 . . USER</span>](#user) <br>
    &emsp; [<span style="color: var(--link)">05 . . INFORMATION</span>](#information) <br>
    &emsp; [<span style="color: var(--link)">06 . . PRICE</span>](#price) <br>
    &emsp; [<span style="color: var(--link)">07 . . USES</span>](#uses) <br>
    &emsp; [<span style="color: var(--link)">08 . . RESERVATION</span>](#reservation) <br>
    &emsp; [<span style="color: var(--link)">09 . . RESERVED</span>](#reserved) <br>

<br> <br>

________
### <a name="introduction"><span style="color: var(--highlight)">01.00 INTRODUCTION</span></a>
________________

<br>


<br> <br>

________
### <a name="stand-alone"><span style="color: var(--highlight)">02.00 STAND ALONE TABLES</span></a>
________________

<br>

<br>

#### <a id="gift-card"><span style="color: var(--highlight)">02.01 GIFT CARD</span></a>
________________

<br>

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| CARD_ID | INT | PK<br>AUTO INCREMENT | - |
| FOR | VARCHAR() | - | small description for the purpose of the git card such as <br>* for {NUM_OF_USERS}<br>* for {ACTIVITY_ID} |
| PRICE | DECIMAL(5, 2) | max amount on the card is $999.99 | - |

<br>

#### <a id="staff"><span style="color: var(--highlight)">02.02 STAFF</span></a>
________________

<br>

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| STAFF_ID | INT | PK<br>AUTO INCREMENT | - |
| NAME | VARCHAR(75) | NOT NULL | - |
| LEVEL | ENUM | NOT NULL<br>1 : EMPLOYEE<br>2 : MANAGER<br>3 : ADMIN | - |
| PASSWORD | VARCHAR(30) | NOT NULL<br>DEFAULT : Hello123 | will store the hashed value of the password, default is hashed value of Hello123 | 

<br>

#### <a id="locker"><span style="color: var(--highlight)">02.03 LOCKER</span></a>
________________

<br>

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| LOCKER_ID | INT | PK<br>DEFAULT : UNASSIGNED | Associated to the real locker number |
| TYPE | ENUM | 1 : SMALL<br>2 : MEDIUM<br>3 : BIG | - |
| NAME | VARCHAR(75) | DEFAULT : UNASSIGNED | The name is the name of the user currently having the locker |

<br>

#### <a id="language"><span style="color: var(--highlight)">02.04 LANGUAGE</span></a>
________________

<br>

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| LANGUAGE_ID | VARCHAR(15) | PK<br>UPPERCASE() | The name of the language (i.e. ENGLISH) |
| ABREVIATION | VARCHAR(3) | UPPERCASE() | the abreviation of the language name (i.e. EN) |

<br>

#### <a id="image"><span style="color: var(--highlight)">02.05 IMAGE</span></a>
________________

<br>

<br>

#### <a id="room"><span style="color: var(--highlight)">02.06 ROOM</span></a>
________________

<br>

<br>

#### <a id="activity"><span style="color: var(--highlight)">02.07 ACTIVITY</span></a>
________________

<br>

<br>

#### <a id="package"><span style="color: var(--highlight)">02.08 PACKAGE</span></a>
________________

<br>

<br>

#### <a id="transaction"><span style="color: var(--highlight)">02.09 TRANSACTION</span></a>
________________

<br>






when user_id = 204 (no content error : The server successfully processed the request, and is not returning any content) => user was deleted

when any id = 418 => nothing was defined as the value for this id, therefore default value. I'm a teapot HTTP status

staff id 
if employee = starts at 1000
if manager = starts at 2000
if admin = starts at 3000


## LOGGER

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| LOG_ID | INT | PK<br>AUTO INCREMENT | - |
| STAFF_ID | INT | references STAFF:STAFF_ID<br>DEFAULT : 418 | 418 is when nothing was defined as the value for this id, therefore default value. <br>The value is automatically assigned when a staff is deleted from the system : ON UPDATE -> set 418 <br>I'm a teapot HTTP status
| OPERATION | VARCHAR() | NOT NULL | The description of the operation (i.e. MAKE RESERVATION {RESERVATION ID} for {USER ID}) |
| LOG_TIME | DATE | DEFAULT : CURRENT_DATE() | - |

## USER

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| USER_ID | INT | PK<br>AUTO INCREMENT | - |
| LANGUAGE_ID | VARCHAR(15) | references LANGUAGE:LANGUAGE_ID<br>NOT NULL | the language the user uses |
| MEMBERSHIP_ID | INT | - | the id associated to the user<br>else : NULL if there is no membership |
| fname | VARCHAR(75) | - | first name of the user | 
| lname | VARCHAR(75) | - | last name of the user | 
| email | VARCHAR(75) | - | email of the user |
| phone | VARCHAR(20) | - | phone number of the user (is big enough to accept almost all countries phone numbers) |
| PASSWORD | VARCHAR(30) | NOT NULL<br>DEFAULT : Hello123 | will store the hashed value of the password, default is hashed value of Hello123 | 

## MEMBERSHIP

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| MEMBERSHIP_ID | INT | PK<br>AUTO INCREMENT | - |
| LOCKER_ID | INT | references LOCKER:LOCKER_ID<br>NOT NULL | - | 
| BOW_RENTAL | BOOLEAN | DEFAULT:FALSE | is only TRUE if the user needs to rent a bow | 
| START | DATE | DEFAULT : CURRENT_DATE() | the start can be defined manually (for a later date) but if not, is set to the date the update is made | 
| END | DATE | DEFAULT : CURRENT_DATE() + 1 MONTH | the end date can be manually made (1, 3, 6, 12 months) and if not defined, is set to the minimum (1 month) from the current date | 

## ACTIVITY

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| ACTIVITY_ID | VARCHAR(6) | NOT NULL | is always in format XXX-XX<br>except for archery courses it is always in format : {first letter + first following consonnant + first letter of the seciond word OR last letter of the word}-{duration of the activity in minutes}<br>If it is for archery it is always {ARC}+{course type (i.e. L0 for level 0)} |
| NAME | VARCHAR(50) | UNIQUE | the name of the activity |
| PRICE | DECIMAL(5, 2) | max amount on the card is $999.99 | - |
| DURATION | INT | NOT NULL | duration of the activity in minutes | 

## PACKAGE

| COLUMN | DATATYPE | CONSTRAINTS | NOTES |
|--------|----------|-------------|-------|
| PACKAGE_ID | VARCHAR(7) | NOT NULL | always in format XXX-XXX<br>if its a package = PKG else 000 |
| CATEGORY | ENUM | 



1 : NOT A PACKAGE : 000-000<br>2 : INDIVIDUAL : PKG-INx<br>3 : BIG GROUP : PKG-SMx<br>4 : DATE NIGHT : PKG-DNx<br>5 : KIDS BIRTHDAY : PKG-KBx<br>6 : TEEN BIRTHDAY : PKG-TBx<br>PKG-CEx : CORPORATE EVENT<br>PKG-OEx : OUTSIDE EVENT<br>PKG-PEx : PRIVATE EVENT |



## ACT_INFORMATION

## PKG_INFORMATION

## PRICE

## CONTAINS

## ROOM

## IMAGE

## USES

## RESERVATION

## TRANSACTION

## RESERVED

