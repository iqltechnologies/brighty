<p align="center">
    <img src="https://github.com/tariqsocial/brighty/blob/main/Logo.png?raw=true" height="100px">
</p>

<h1 align="center">Brighty - Web Hosting Automation, Billing and Provisioning Platform for the Sane Hosts</h1>


:wave: Hi There! We are creating a production-level "WHMCS Alternative" with integrated billing, automation and provisioning Platform for web hosters. This project aims to give you a usable and extendable platform with minimal but all required features to run a web design agency or a hosting company.


<div align="center">

  ![PULL REQUEST](https://img.shields.io/badge/contributions-welcome-green)  ![status](https://img.shields.io/badge/Status-Not%20Usable-red)   ![PULL REQUEST](https://img.shields.io/badge/license-MIT-blue) ![PHP Version Require](http://poser.pugx.org/phpunit/phpunit/require/php)  ![Laravel](https://img.shields.io/badge/framework-WordPress-blue)   ![BoxBilling Size](https://img.shields.io/github/repo-size/iqltechnologies/brighty.svg?style=popout) [![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/iqltechnologies/brighty/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/iqltechnologies/brighty/?branch=main)     
 
</div>

## Every one is fed up of paid web hosting automation software!

So What do we do? The answer is to create something together. In our experience, current alternatives are not only outdated (and in code debt) but also needs to be built keeping in view the current needs of the industry. We want to create something which we will use ourselves in production.  

Not Limited to Hosting, it can be used for any kind of automated billing and provisioning business. 

## Architecture: Keeping it simple with WordPress and WooCommerce

This app is made up of four different and independent parts. These parts are envisioned to be built independednt of each other and each should work on a separate hosting accounts/server or on same hosting account. To achieve this, all necessary integrations are built-in.

  - **Website** : This is where users will be able to purchase your products such as domain name, website, packages, hosting etc; (WordPress Theme and Static HTML Site integration Code) 
  - **Client Area**: This is where your customers will be able to login and manage their accounts, view invoices, domain names, hosting and login to control panels etc.;  (Woocommerce My Account Area)
  - **Backend / API**: This is the API used by Website, Admin Area, and Client Area to fetch and store data; (WordPress REST API)
  - **Admin Area** : used to manage and control your products, orders, users, servers, domains etc.; (WordPress Dashboard)


## :date: Release Date for V1.0 (Tentative)

We are targeting to release it by 1 Nov 2023.

## Status: Not Usable. Just Started. We are in early development/ideation stage. 

Looking for Core group. 



## Notes & Decisions

It was initially planned to be developed using laravel or codeigniter however upon realizing the fact that wordpress & woocommerce have quicker development time, more flexibility and a vast amount of available plugins, I decided that it is a wiser decision to go with using wordpress as a backend. 

The only issue here seems to be scalability issues howver that is accounted for because our frontend is basically plain & simple old html & css. The user dashboard and admin dashboards are also accounted for in other ways.



### :handshake: Join Our Community

 <a href="https://discord.gg/dUCmJcs5xv"><img src="https://img.shields.io/badge/Discord-Join%20Discord%20Server-purple"></a>
 <a href="https://t.me/+PyUnIpTv9i42ODJl"><img src="https://img.shields.io/badge/Telegram-Join%20Telegram%20Channel-skyblue"></a>

## :bicyclist: Current Goals

- Integrate a login script - allows you to create a login popup and logged-in user bar on any site by interting a few lines of js code
- User Registration | Supported: Social Media, Mobile, Email, Email Verification, SMS Verification etc.
- User Dashboard / Client Panel

<table><tr><td><strong>Domain Name</strong> :globe_with_meridians: :</td><td><strong>Hosting</strong> :desktop_computer:</td><td><strong>Invoice</strong> :page_with_curl:</td></tr>
    <tr><td>Automated Registration | Supported : Logicboxes</td><td>CWP automated Provisioning</td><td>Create Invoice</td></tr>
    <tr><td>Name Server Update</td><td>Hosting Package Purchase</td><td>Invoice Payment </td></tr>
    <tr><td>Domain Contact Update</td><td>One Click Hosting Control Panel Login</td><td>Automated Invoice Generation</td><td></td></tr>
    <tr><td>Domain Contact Update</td><td>Hosting Renwal Reminder</td><td>Invoice Payment Reminder</td></tr>
</table>


**Payment Gateways** :credit_card:
  - Paypal  - RazorPay  - Skrill    - Stripe

## :electric_plug: Pluggable Architecture

Using WordPress-Like Plugin Architecture allows you to develop plugins, search and activate them from the marketplace

## :trophy: Developing 

Fork and Use docker compose in this repo. Database and Code is included together. Pull Request are welcome

## Development Stacks:

- WordPress
- MySQL
- Bootstrap

# Requirements
  ## Client Area and Admin Area
    Client Area and Admin Area have no special requirement as they are static HTML 

  ## Backend (API)
    It is built on WordPress; PHP version 7.3 or newer with following extensions intalled: *intl*, *mbstring* php-json, php-mysqlnd, php-xml. A database is also required.

# Installation Instruction

  You can install Client Area, Admin Area, Website and API separately as well as together(easy). Follow these steps carefully

  ## Option 1 : One Click Installer

  - Download Brighty.zip and Upload **one level above public directory** (generally public_html on cpanel and /var/www/html elsewhere; do not upload zip to public_html or html instead one level up eg. www). 
  - In your browser open your-url.tld/install and follow on-screen instruction

  ## Option 2 : Manual Install 

  - For latest development version download project as zip or download a stable release(Recommended)
  - Go to public directory of your hosting (generally public_html on cpanel and /var/www/html elsewhere) and upload the contents of public folder there.
  - edit brighty-config.json and place your brighty backend url there (with protocol and trailing slash) Frontend installation is complete.
  - to install backend upload everything including public directory one level above public. make sure contents of public directory are public and nothing else otherwise your system will be open to everyone for playing aka hacking and expliting.
  - if you want to keep your backend on the same domain/directory, move to next step otherwise if your backend is separated then remove everything other than index.php and .htaccess files from project public folder.
  - IMPORTANT : remove .htaccess and index.php from project root (/brighty folder) regardless of your previous step as it is there for helping us during development only
  - Login to your frontend with  

## Installation Note: 

  - there is no specific admin url. To access admin area you need to login as a normal urser with admin credentials

## :green_book: License

<a href="https://creativecommons.org/licenses/by-nc-sa/4.0/">Attribution-NonCommercial-ShareAlike 4.0 International (CC BY-NC-SA 4.0)</a>
<img src="https://smartcopying.edu.au/wp-content/uploads/2020/03/image006-1.jpg">



# Documentation


 - This plugin registers a page template and uses it. The template is located in /templates
 - The user dashboard page is located on /templates/user-dashboard.php 
 - most functions code is located on /functions/do.php

  **Registration Page**:
    Create a page named register or anything.
    When creating the page select template - "Brighty Full Width if you want to use full width". @/templates/full-width.php
    Insert a shortcode on that page [brighty_register_form] @function/do.php : @/template/woocommerce/register.php 
    the code for registration form is located on 




  # TODO
  - kirki plugin
  - send email on account details update
  - highlight field in registration form on error
  - Use endpoint url function instead of hardcoding it for woocommerce
  - Use endpoint urls in ajax requests on list notifications page 
  - combile js functions in same file for manageability