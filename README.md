# Facebook-Lite-2
Building a web application with a database (MongoDB) backend

## Overview
Simple web applications can be designed using a two-tier architecture, in which a client communicates directly with a server. A PHP web application communicates directly with a MongoDB database using the PHP Mongodb API (https://www.php.net/manual/en/set.mongodb.php)
The application involves the creation of a number of PHP pages. In each of these pages you use HTML and CSS to implement a simple interface, and use PHP (with MongoDB API)  to perform the logic that directly queries the database and inserts the retrieved data back into web pages.

## Assessment Details
Let’s assume that a decision has been made to develop a light version (called Facebook-Lite) of the ever-popular Facebook application. This light version has limited functionalities compared to the full version. Only core functionalities are to be retained. You are tasked with the design of the database backend and web frontend.
After a careful analysis, the following core functionalities are to be retained in the light version.
The system stores information on members; each member is uniquely identified by email and a full name, screen name, date of birth, gender, status, and location are to be stored. Each member has a visibility level on Facebook-Lite (private, friends-only, or everyone).
As in the case of Facebook, members form networks of friends. A friendship is always between two members. A member can send a friend request to another member. Once that member accepts the request, they become friends on Facebook-Lite. Each friendship has a start date.
Members can make posts on Facebook-Lite. A post has a unique postID and a body and a timestamp. Facebook-Lite only allows textual posts.
Other members can respond to posts. They can also respond to previous responses. Responses are identical to posts in structure, so, they share the same structure as in the original post. Each response will have a parent post or a parent response.
Members can “like” posts and responses. The system keeps track of likes, specifically the member who makes the like and the corresponding post/ response. No other information is required on likes.

## Summary of Tasks:
1.	Analyse the requirements outlined in the above problem description and develop a database backend design based on MongoDB's document-based database model;
2.	Use MongoDB Compass tool to build the document collection required for the database backend;
3.	Write a PHP application to do the following tasks:
1.	Create a new facebook-lite account, log into your current account;
2.	Manage account;
3.	Invite a friend (among current users) and accept (or reject) friend requests you receive;
4.	Add a post;
5.	Add a Like to other posts;
6.	Add a response to other posts;
7.	Display your Facebook page rendered in a user-friendly and accessible manner.
4.	Write a research report comparing the two implementations.

## Task Descriptions:

You will develop PHP scripts required to do all the CRUD (create, read, update and delete) operations associated with various functions of the application. Most of these scripts will require embedded MongoDB API calls. PHP - MongoDB API is detailed on https://www.php.net/manual/en/set.mongodb.php (Links to an external site.)
Your application must consist of the following pages.

### Application homepage:
The home page will have a small form to enter the username and password of a facebook-lite user. There must be a link to another page for new users to create a new account. When the form is submitted, the user credentials are checked and if correct, the user will be taken to their main page.
### New User Creation page:
This page will ask for email (used as username, as well as communication) and a full name, screen name, date of birth, gender, status, and the location. Furthermore, the user will be required to enter their visibility level. Read problem specification for details.  Once the account is created, the user will be taken to their main page.
### Main page:
This page will have several sections. (1) at the middle section, it shows up posts (your own as well as friends). Beneath each post, there is a button "like" it and a test box to end comments/ responses. (2) at the top of posts, there must be a text box to enter your new posts. (3) the right-hand pane is for managing friendships. At the top, it will show a list of pending friendship requests (if any). At the bottom section of the right pane, will let the user to search other users and send friendship requests. (4) The left-hand pane is for managing your account. It should have links to separate pages for updating the profile, and for deleting the account.
### Account Profile Maintenance page: 
This page should allow you to change your screen name, status, location, and visibility level.
You are required to complete this milestone by the due date and submit your codebase, by following the submission instructions.

# Run Locally

##Requirements: PHP and MongoDB installed locally.

• Pull the folder in htdocs of your php installed folder. Make sure you place folder "public_html" in htdocs folder.

• Go to connection.php file and check whether your connection with MongoDB database is working fine. 

• Go to your browser and run url "http://localhost/public_html/index.php".
