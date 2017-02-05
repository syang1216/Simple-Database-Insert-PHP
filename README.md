# Project 1 - Globitek CMS

Time spent: 5 hours spent in total

## User Stories

The following **required** functionality is completed:

1. [check]  Required: Create a Users Table
  * [check]  Required: Use the command line to connect to the database "globitek".
  * [check]  Required: Define a table "users" with the required columns.

2. [check]  Required: Create a Page with an HTML Form
  * [check]  Required: It has required text inputs.
  * [check]  Required: It submits to itself.
  * [check]  Required: It looks correct in a browser.
  
3. [check]  Required: Detect when the form is submitted.
  * [check]  Required: When page loads, page displays the form.
  * [check]  Required: When form submits, page retrieves the form data.

4. [check]  Required: Validate form data.
  * [check]  Required: Require the provided validation functions library.
  * [check]  Required: Validate the presence of all form values.
  * [check]  Required: Validate that no values are longer than 255 characters.
  * [check]  Required: Validate that first\_name and last\_name have at least 2 characters.
  * [check]  Required: Validate that username has at least 8 characters.
  * [check]  Required: Validate that email contains a "@".

5. [check]  Required: Display form errors if any validations fail.
  * [check]  Required: Do not submit the data to the database.
  * [check]  Required: Redisplay the form with the submitted values filled in.
  * [check]  Required: Report all errors as a list above the form.
  * [check]  Required: Test each field to ensure you get the expected errors.

6. [check]  Required: Submit successfully-validated form values to the database.
  * [check]  Required: Write an SQL insert statement.
  * [check]  Required: Add current date and time to "created\_at".
  * [check]  Required: Follow best practices regarding the query result and database connection.
  * [check]  Required: Use the command line to check the records.

7. [check]  Required: Redirect the user to a confirmation page.
    * [check]  Required: Locate the page "public/registration\_success.php".
    * [check]  Required: Redirect the user to the new page. ([Tips](#!hints))

8. [check]  Required: Sanitize all dynamic output for HTML. ([Tips](#!hints))


The following advanced user stories are optional:

* [check]  Bonus 1: Validate that form values contain only whitelisted characters.

* [check]  Bonus 2: Validate the uniqueness of the username.


## Video Walkthrough

Here's a walkthrough of implemented user stories:

<img src='https://github.com/syang1216/Simple-Database-Insert-PHP/blob/master/week1.gif' title='Video Walkthrough' width='' alt='Video Walkthrough' />

GIF created with [LiceCap](http://www.cockos.com/licecap/).

## Notes

Describe any challenges encountered while building the app.

## License

    Copyright [2017] [Stephen Yang]

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.