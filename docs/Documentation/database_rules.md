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

| COLUMN  | DATATYPE      | CONSTRAINTS                       | NOTES                                                                                                     |
|---------|---------------|-----------------------------------|-----------------------------------------------------------------------------------------------------------|
| CARD_ID | INT           | PK<br>AUTO INCREMENT              | -                                                                                                         |
| FOR     | VARCHAR()     | -                                 | small description for the purpose of the git card such as <br>* for {NUM_OF_USERS}<br>* for {ACTIVITY_ID} |
| PRICE   | DECIMAL(5, 2) | max amount on the card is $999.99 | -                                                                                                         |

<br>

#### <a id="staff"><span style="color: var(--highlight)">02.02 STAFF</span></a>

________________

<br>

| COLUMN   | DATATYPE    | CONSTRAINTS                                          | NOTES                                                                            |
|----------|-------------|------------------------------------------------------|----------------------------------------------------------------------------------|
| STAFF_ID | INT         | PK<br>AUTO INCREMENT                                 | -                                                                                |
| NAME     | VARCHAR(75) | NOT NULL                                             | -                                                                                |
| LEVEL    | ENUM        | NOT NULL<br>1 : EMPLOYEE<br>2 : MANAGER<br>3 : ADMIN | -                                                                                |
| PASSWORD | VARCHAR(30) | NOT NULL<br>DEFAULT : Hello123                       | will store the hashed value of the password, default is hashed value of Hello123 | 



when any id = 418 => nothing was defined as the value for this id, therefore default value. I'm a teapot HTTP status

staff id
if employee = starts at 1000
if manager = starts at 2000
if admin = starts at 3000

<br>

#### <a id="locker"><span style="color: var(--highlight)">02.03 LOCKER</span></a>

________________

<br>

| COLUMN    | DATATYPE    | CONSTRAINTS                        | NOTES                                                                                                                                |
|-----------|-------------|------------------------------------|--------------------------------------------------------------------------------------------------------------------------------------|
| LOCKER_ID | INT         | PK                                 | Associated to the real locker number                                                                                                 |
| TYPE      | ENUM        | 1 : SMALL<br>2 : MEDIUM<br>3 : BIG | -                                                                                                                                    |
| NAME      | VARCHAR(75) | DEFAULT : UNASSIGNED               | The name is the name of the user currently having the locker, if the locker is not assigned yet / anymore : reverts to default value |

<br>

#### <a id="language"><span style="color: var(--highlight)">02.04 LANGUAGE</span></a>

________________

<br>

| COLUMN       | DATATYPE    | CONSTRAINTS       | NOTES                                          |
|--------------|-------------|-------------------|------------------------------------------------|
| LANGUAGE_ID  | VARCHAR(15) | PK<br>UPPERCASE() | The name of the language (i.e. ENGLISH)        |
| ABBREVIATION | VARCHAR(3)  | UPPERCASE()       | the abreviation of the language name (i.e. EN) |

<br>

#### <a id="image"><span style="color: var(--highlight)">02.05 IMAGE</span></a>

________________

<br>

| COLUMN     | DATATYPE    | CONSTRAINTS           | NOTES                                                                                                                                                                                                                                                                                                                                        |
|------------|-------------|-----------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| IMAGE_ID   | VARCHAR(17) | PK<br>UPPERCASE()     | The id of the image. It contains 3 sets of numbers and letters (6-4-6) separated by underscores (snakecase)<br>The id is in the format [ACTIVITY ID]_[IMAGE TYPE]_[6 DIGITS & LETTERS IMAGE ID]<br>i.e. ARCL0_LOGO_0F0F0F (archery course level 0 _ activity logo _ img id), PKGSG1_CRSL_22FG93 (package small group 1 _ carroussel _ img id |
| IMAGE_DATA | MEDIUMBLOB  | Max image size : 16MB |                                                                                                                                                                                                                                                                                                                                              |

<br>

#### <a id="room"><span style="color: var(--highlight)">02.06 ROOM</span></a>

________________

<br>

| COLUMN     | DATATYPE    | CONSTRAINTS           | NOTES                                                                                                                                                                                                                                                                                                                                        |
|------------|-------------|-----------------------|----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| IMAGE_ID   | VARCHAR(17) | PK<br>UPPERCASE()     | The id of the image. It contains 3 sets of numbers and letters (6-4-6) separated by underscores (snakecase)<br>The id is in the format [ACTIVITY ID]_[IMAGE TYPE]_[6 DIGITS & LETTERS IMAGE ID]<br>i.e. ARCL0_LOGO_0F0F0F (archery course level 0 _ activity logo _ img id), PKGSG1_CRSL_22FG93 (package small group 1 _ carroussel _ img id |
| IMAGE_DATA | MEDIUMBLOB  | Max image size : 16MB |                                                                                                                                                                                                                                                                                                                                              |

<br>

#### <a id="activity"><span style="color: var(--highlight)">02.07 ACTIVITY</span></a>

________________

<br>

| COLUMN      | DATATYPE     | CONSTRAINTS             | NOTES                                                                                                                                             |
|-------------|--------------|-------------------------|---------------------------------------------------------------------------------------------------------------------------------------------------|
| ACTIVITY_ID | VARCHAR(6)   | PK<br>UPPERCASE()       | A standardized activity id : it should always be [ACTIVITY]-[DURATION (in minutes) OR COURSE LEVEL]<br/>see below for the list of base activities |
| NAME        | VARCHAR(30)  | UNIQUE                  |                                                                                                                                                   |
| DURATION    | INT          | in minutes<br/>NOT NULL |                                                                                                                                                   |


| BASE ACTIVITY                      | ACTIVITY ID | NOTES                                                        |
|------------------------------------|-------------|--------------------------------------------------------------|
| ARCHERY (base)                     | ARx-xx      | if its a course : ARC-xx<br/>if its a practice : ARP-xx      |
| ARCHERY PRACTICE                   | ARP-60      | 60 minutes archery practice in the range                     |
| ARCHERYTIME                        | ART-60      | virtual archery time for 60 minutes                          |
| COMBAT ARCHERY                     | CAR-75      | combat archery (15 minutes of prep, 60 minutes in the range) |
| NERF BATTLE                        | NFB-75      | nerf battle (15 minutes of prep, 60 minutes in the range)    |
| NERF BATTLE FOR BIRTHDAY           | NFB-90      | nerf battle (15 minutes of prep, 60 minutes in the range)    |
| RAGE CAGE                          | RGC-60      | rage cage (15 minutes of prep, 45 minutes in the room)       |
| WEAPON THROWING COURSE             | WTC-60      | weapon throwing course (60 minutes)                          |
| KNIFE THROWING PRACTICE            | KTP-12      | knife throwing practice (2 hours)                            |  
| ARCHERY INTRODUCTION COURSE        | ARC-L0      | introduction = level 0                                       |
| ARCHERY BEGINNER PLUS              | ARC-L1      | beginner plus = includes all 4 courses                       |
| ARCHERY ASIAN TRADITIONAL COURSE   | ARC-T3      | traditional course for archery level 3                       |
| ARCHERY COURSE WITH SAM            | ARC-S3      | level 3 course with Sam for 2 hours                          |
| ARCHERY ADVANCED COURSE WITH BRYAN | ARC-B4      | level 4 course with Bryan for 2 hours                        |
| ARCHERY HIGH PERFORMANCE TEAM      | ARC-B5      | level 5 course for the high performance team for 2hours      |
| ARCHERY IN HOUSE COMPETITION       | HCP-AR      | house competition archery                                    |
| KNIFE THROWING COMPETITION         | HCP-KT      | house competition knife throwing                             |
| PARTY ROOM                         | PTY-60      | party room for birthday party (1 hour)                       |
| PARKING                            | PAR-KG      | parking place reservation                                    |

<br>

#### <a id="package"><span style="color: var(--highlight)">02.08 PACKAGE</span></a>

________________

<br>

| COLUMN      | DATATYPE     | CONSTRAINTS                                                                                                                                                                                                                        | NOTES                                                                                                                                           |
|-------------|--------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|-------------------------------------------------------------------------------------------------------------------------------------------------|
| ACTIVITY_ID | VARCHAR(6)   | PK<br>UPPERCASE()                                                                                                                                                                                                                  | A standardized activity id : it should always be [ACTIVITY]-[DURATION (in minutes) OR COURSE LEVEL]<br/>in other words : except for archery courses it is always in format : {first letter + first following consonnant + first letter of the seciond word OR last letter of the word}-{duration of the activity in minutes}<br/>see below for the list of base packages |
| CATEGORY    | ENUM         | UNIQUE <br/> 1 : NOT A PACKAGE <br/> 2 : INDIVIDUAL <br/> 3 : SMALL GROUP <br/> 4 : BIG GROUP <br/> 5 : DATE NIGHT <br/> 6 : KIDS BIRTHDAY<br/> 7 : TEEN BIRTHDAY <br/> 8 : CORPORATE EVENT <br/> 9 : OUTSIDE EVENT<br/>10 : OTHER |                                                                                                                                                 |
| NAME        | VARCHAR(40)  | UNIQUE                                                                                                                                                                                                                             |                                                                                                                                                 |


| BASE PACKAGE             | PACKAGE ID  | NOTES                                                                                                                                                  |
|--------------------------|-------------|--------------------------------------------------------------------------------------------------------------------------------------------------------|
| **NOT A PACKAGE**        | **000-000** | enum 1<br/>since its numbers => easy to check if its not a package in the backend                                                                      |
| **INDIVIDUAL**           | **PKG-IND** | enum 2<br/>**PKG-IND**-XXX-XX-XXX-XX-XXX-XXX-XXX-X                                                                                                     |
| **SMALL GROUP**          | **PKG-SG_** | enum 3                                                                                                                                                 |
| SMALL GROUP 1            | PKG-SG1     | weapon throwing + rage cage<br/>**PKG-SG1-WTC-60-RGC-60**-XXX-XXX-XXX-X                                                                                |
| SMALL GROUP 2            | PKG-SG2     | weapon throwing + archery<br/>**PKG-SG2-WTC-60-ARC-L0**-XXX-XXX-XXX-X                                                                                  |
| SMALL GROUP (3) ULTIMATE | PKG-SG3     | weapon throwing + rage cage + archery<br/>**PKG-SG3-RGC-60-ARC-L0**-XXX-XXX-XXX-X (for reservation 1 & 2) <br/>**PKG-SG3-WTC-60-000-00**-XXX-XXX-XXX-3 |
| **BIG GROUP**            | **PKG-BG_** | enum 4                                                                                                                                                 |
| **DATE NIGHT**           | **PGK-DN_** | enum 5                                                                                                                                                 |
| DATE NIGHT 1             | PKG-DN1     | weapon throwing (30 minutes) + rage cage<br/>**PKG-DN1-WTC-30-RGC-60**-XXX-XXX-XXX-X                                                                   |
| DATE NIGHT 2             | PKG-DN2     | weapon throwing (30 minutes) + archery<br/>**PKG-DN2-WTC-30-ARC-L0**-XXX-XXX-XXX-X                                                                     |
| DATE NIGHT 3             | PKG-DN3     | rage cage + archery<br/>**PKG-DN2-RGC-60-ARC-L0**-XXX-XXX-XXX-X                                                                                        |
| **KID BIRTHDAY**         | **PKG-KB_** | enum 6                                                                                                                                                 |
| KID BIRTHDAY 1           | PKG-KB1     | nerf training + nerf battle + party room (50 minutes + 10 minutes loose)<br/>**PKG-KB1-NFB-90-PTY-60**-XXX-XXX-XXX-X                                   |
| **TEEN BIRTHDAY**        | **PKG-TB_** | enum 7                                                                                                                                                 |
| TEEN BIRTHDAY 1          | PKG-TB1     | weapon throwing 2 hours<br/>**PKG-TB1-WTC-60-WTC-60**-XXX-XXX-XXX-X                                                                                    |
| TEEN BIRTHDAY 2          | PKG-TB2     | nerf battle (1 hour) + party room (50 minutes + 10 minutes loose)<br/>**PKG-TB2-NFB-75-PTY-60**-XXX-XXX-XXX-X                                          |
| TEEN BIRTHDAY 3          | PKG-TB3     | weapon throwing + archery<br/>**PKG-TB1-WTC-60-ARC-60**-XXX-XXX-XXX-X                                                                                  |
| TEEN BIRTHDAY 4          | PKG-TB4     | combat archery (1 hour + 15 minutes of loose) + weapon throwing<br/>**PKG-TB1-CAR-75-WTC-60**-XXX-XXX-XXX-X                                            |
| TEEN BIRTHDAY 5          | PKG-TB5     | combat archery (1 hour + 15 minutes of loose) + party room (50 minutes + 10 minutes loose)<br/>**PKG-TB2-CAR-75-PTY-60**-XXX-XXX-XXX-X                 |
| **CORPORATE EVENT**      | **PKG-CE_** | enum 8                                                                                                                                                 |
| **OUTSIDE EVENT**        | **PGK-OE_** | enum 9                                                                                                                                                 |
| **OTHER**                | **PKG-OTR** | enum 10                                                                                                                                                |

<br>

#### <a id="transaction"><span style="color: var(--highlight)">02.09 TRANSACTION</span></a>

________________

<br>

| COLUMN         | DATATYPE       | CONSTRAINTS                                                                                                                                | NOTES                                    |
|----------------|----------------|--------------------------------------------------------------------------------------------------------------------------------------------|------------------------------------------|
| TRANSACTION_ID | INT            | PK<br>NOT NULL<br>AUTO_INCREMENT                                                                                                                             |                                          |
| PAID           | BOOLEAN        | DEFAULT = FALSE                                                                                                                            | simple check if the customer paid or not |
| AMOUNT         | DECIMAL (5, 2) | max amount : $ 999.99                                                                                                                      |                                          |
| TYPE           | ENUM           | 1 : CASH<br/>2 : DEBIT<br/>3 : CREDIT<br/>4 : CREDIT - MASTERCARD<br/>5 : CREDIT - VISA<br/>6 : CREDIT - AMEX<br/>7 : CHEQUE<br/>8 : OTHER |                                          |



<br> <br>

________

### <a name="stand-alone"><span style="color: var(--highlight)">03.00 CONNECTING TABLES</span></a>

________________

<br>

<br>

#### <a id="logger"><span style="color: var(--highlight)">03.01 LOGGER</span></a>

________________

<br>

```Connects with table [STAFF](#staff) ```

| COLUMN    | DATATYPE  | CONSTRAINTS                                | NOTES                                                                                                                                                                                                                  |
|-----------|-----------|--------------------------------------------|------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
| LOG_ID    | INT       | PK<br>AUTO INCREMENT                       | -                                                                                                                                                                                                                      |
| STAFF_ID  | INT       | references STAFF:STAFF_ID<br>DEFAULT : 418 | 418 is when nothing was defined as the value for this id, therefore default value. <br>The value is automatically assigned when a staff is deleted from the system : ON UPDATE -> set 418 <br>I'm a teapot HTTP status 
| OPERATION | VARCHAR() | NOT NULL                                   | The description of the operation (i.e. MAKE RESERVATION {RESERVATION ID} for {USER ID})                                                                                                                                |
| LOG_TIME  | DATE      | DEFAULT : NOW() *will return the current date + the time the action was made*                   | |


<br>

#### <a id="contains"><span style="color: var(--highlight)">03.02 CONTAINS</span></a>

________________

<br>

<br>

#### <a id="membership"><span style="color: var(--highlight)">03.03 MEMBERSHIP</span></a>

________________

<br>

| COLUMN        | DATATYPE | CONSTRAINTS                             | NOTES                                                                                                                            |
|---------------|----------|-----------------------------------------|----------------------------------------------------------------------------------------------------------------------------------|
| MEMBERSHIP_ID | INT      | PK<br>AUTO INCREMENT                    | -                                                                                                                                |
| LOCKER_ID     | INT      | references LOCKER:LOCKER_ID<br>NOT NULL | -                                                                                                                                | 
| BOW_RENTAL    | BOOLEAN  | DEFAULT:FALSE                           | is only TRUE if the user needs to rent a bow                                                                                     | 
| START         | DATE     | DEFAULT : CURRENT_DATE()                | the start can be defined manually (for a later date) but if not, is set to the date the update is made                           | 
| END           | DATE     | DEFAULT : CURRENT_DATE() + 1 MONTH      | the end date can be manually made (1, 3, 6, 12 months) and if not defined, is set to the minimum (1 month) from the current date | 


<br>

#### <a id="user"><span style="color: var(--highlight)">03.04 USER</span></a>

________________

<br>


| COLUMN        | DATATYPE    | CONSTRAINTS                                 | NOTES                                                                                 |
|---------------|-------------|---------------------------------------------|---------------------------------------------------------------------------------------|
| USER_ID       | INT         | PK<br>AUTO INCREMENT                        | -                                                                                     |
| LANGUAGE_ID   | VARCHAR(15) | references LANGUAGE:LANGUAGE_ID<br>NOT NULL | the language the user uses                                                            |
| MEMBERSHIP_ID | INT         | -                                           | the id associated to the user<br>else : NULL if there is no membership                |
| fname         | VARCHAR(75) | -                                           | first name of the user                                                                | 
| lname         | VARCHAR(75) | -                                           | last name of the user                                                                 | 
| email         | VARCHAR(75) | -                                           | email of the user                                                                     |
| phone         | VARCHAR(20) | -                                           | phone number of the user (is big enough to accept almost all countries phone numbers) |
| PASSWORD      | VARCHAR(30) | NOT NULL<br>DEFAULT : Hello123              | will store the hashed value of the password, default is hashed value of Hello123      | 

when user_id = 204 (no content error : The server successfully processed the request, and is not returning any
content) => user was deleted

<br>

#### <a id="information"><span style="color: var(--highlight)">03.05 INFORMATION</span></a>

________________

<br>

<br>

#### <a id="price"><span style="color: var(--highlight)">03.06 PRICE</span></a>

________________

<br>

<br>

#### <a id="uses"><span style="color: var(--highlight)">03.07 USES</span></a>

________________

<br>

<br>

#### <a id="reservation"><span style="color: var(--highlight)">03.08 RESERVATION</span></a>

________________

<br>

<br>

#### <a id="reserved"><span style="color: var(--highlight)">03.09 RESERVED</span></a>

________________

<br>
